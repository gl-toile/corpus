<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Corpus;
use App\Entity\Artwork;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $randomUser = new User();
        $randomUser->setEmail("mail@test.com");
        $randomUser->setFirstName($faker->firstName());
        $randomUser->setLastName($faker->lastName());
        $randomUser->setPassword("mypassword");
        $randomUser->setInstagramAccount("@" . $randomUser->getFirstName() . $randomUser->getLastName());
        $randomUser->setAbout($faker->text());
        $manager->persist($randomUser);

        $categories = [
            'Dessin',
            'Peinture',
            'Sculpture'
        ];

        $corpusCollection = new ArrayCollection();

        for($i = 0 ; $i < 5 ; $i++){
            $randomCorpus = new Corpus();
            $randomCorpus->setTitle("collection " . $faker->name());
            $randomCorpus->setSlug($faker->slug());
            $randomCorpus->setDescription($faker->text());
            $corpusCollection[0] = $randomCorpus; 
            $manager->persist($randomCorpus);
            $manager->flush();
        }

        foreach($categories as $categoryName) {
            $category = new Category();
            $category->setTitle($categoryName);
            $category->setDescription($faker->text());
            $category->setSlug($faker->slug());
            $manager->persist($category);
            $manager->flush();

            for ($i = 0; $i < 20; $i++) {
                $artwork = new Artwork();
                $artwork->setTitle("Portrait de " . $faker->name());
                $artwork->setRef("2001" . "0" . $i);
                $artwork->setIsToSold(true);
                $artwork->setIsSold(false);
                $artwork->setCreationDate(new \DateTime());
                $artwork->setCreatedAt(new \DateTime());
                $artwork->setDescription($faker->text());
                $artwork->setIsInCorpus(true);
                $artwork->setSlug($artwork->getRef());
                $artwork->setMainImage("https://picsum.photos/200/300?sig=" . $i);
                $artwork->setUser($randomUser);
                $artwork->setCategory($category);

                if(random_int(0, 100) < 35){
                    for($j = 0 ; $j < mt_rand(0, count($corpusCollection)) ; $j++){
                        $corpus = $corpusCollection[0];
                        if(!$corpusCollection->contains($corpus)){
                            $artwork->addCorpus($corpus);
                        }
                    }
                }

                $manager->persist($artwork);
                $manager->flush();
            }
        }
    }
}
