<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Artwork;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $randomUser = new User();
        $randomUser->setEmail("mail@test.com");
        $randomUser->setFirstName($faker->firstName());
        $randomUser->setLastName($faker->lastName());
        $randomUser->setInstagramAccount("@" . $randomUser->getFirstName() . $randomUser->getLastName());
        $randomUser->setAbout($faker->text());

        $categories = [
            'Dessin',
            'Peinture',
            'Sculpture'
        ];

        foreach ($categories as $category) {
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

                $manager->persist($artwork);
                $manager->flush();
            }
        }
    }
}
