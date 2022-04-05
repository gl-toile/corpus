<?php

namespace App\Tests;

use App\Entity\Artwork;
use App\Entity\Category;
use App\Entity\Corpus;
use PHPUnit\Framework\TestCase;

class ArtworkUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $artwork = new Artwork();
        $datetime = new \DateTime();
        $url = "http://www.test.com/img.jpg";
        $category = new Category();
        
        $corpus1 = new Corpus();
        $corpus1->setTitle("Corpus1");
        
        $corpus2 = new Corpus();
        $corpus2->setTitle("Corpus2");

        $artwork->setTitle("My title");
        $artwork->setRef("My ref");
        $artwork->setWidth(5,5);
        $artwork->setHeight(6,2);
        $artwork->setIsToSold(true);
        $artwork->setIsSold(true);
        $artwork->setPrice("3OO");
        $artwork->setCreationDate($datetime);
        $artwork->setCreatedAt($datetime);
        $artwork->setDescription("My description");
        $artwork->setIsInCorpus(true);
        $artwork->setSlug("my slug");
        $artwork->setMainImage($url);
        $artwork->setCategory($category);
        $artwork->addCorpus($corpus1);
        $artwork->addCorpus($corpus2);

        $this->assertTrue($artwork->getTitle() === "My title");
        $this->assertTrue($artwork->getRef() === "My ref");
        $this->assertTrue($artwork->getWidth() == 5,5);
        $this->assertTrue($artwork->getHeight() == 6,2);
        $this->assertTrue($artwork->getIsToSold() === true);
        $this->assertTrue($artwork->getIsSold() === true);
        $this->assertTrue($artwork->getPrice() === "3OO");
        $this->assertTrue($artwork->getCreationDate() === $datetime);
        $this->assertTrue($artwork->getCreatedAt() === $datetime);
        $this->assertTrue($artwork->getDescription() === "My description");
        $this->assertTrue($artwork->getIsInCorpus() === true);
        $this->assertTrue($artwork->getSlug() === "my slug");
        $this->assertTrue($artwork->getMainImage() === $url);
        $this->assertTrue($artwork->getCategory($category) === $category);
        $this->assertTrue($artwork->getCorpus()->contains($corpus1));
        $this->assertTrue($artwork->getCorpus()->contains($corpus2));
    }

    public function testIsFalse(): void
    {
        $artwork = new Artwork();
        $datetime = new \DateTime();
        $url = "http://www.test.com/img.jpg";
        $category = new Category();
        
        $corpus1 = new Corpus();
        $corpus1->setTitle("Corpus1");
        
        $corpus2 = new Corpus();
        $corpus2->setTitle("Corpus2");

        $corpus3 = new Corpus();
        $corpus3->setTitle("Corpus3");
        $corpus4 = new Corpus();
        $corpus4->setTitle("Corpus4");

        $artwork->setTitle("My title");
        $artwork->setRef("My ref");
        $artwork->setWidth(5.5);
        $artwork->setHeight(6.2);
        $artwork->setIsToSold(true);
        $artwork->setIsSold(true);
        $artwork->setPrice("3OO");
        $artwork->setCreationDate($datetime);
        $artwork->setCreatedAt($datetime);
        $artwork->setDescription("My description");
        $artwork->setIsInCorpus(true);
        $artwork->setSlug("my slug");
        $artwork->setMainImage($url);
        $artwork->setCategory($category);
        $artwork->addCorpus($corpus1);
        $artwork->addCorpus($corpus2);

        $this->assertFalse($artwork->getRef() === "false");
        $this->assertFalse($artwork->getWidth() === 0);
        $this->assertFalse($artwork->getTitle() === "false");
        $this->assertFalse($artwork->getHeight() === 1);
        $this->assertFalse($artwork->getIsToSold() === false);
        $this->assertFalse($artwork->getIsSold() === false);
        $this->assertFalse($artwork->getPrice() === "0");
        $this->assertFalse($artwork->getCreationDate() === new \DateTime('2000-01-01'));
        $this->assertFalse($artwork->getCreatedAt() === new \DateTime('2000-01-01'));
        $this->assertFalse($artwork->getDescription() === "false");
        $this->assertFalse($artwork->getIsInCorpus() === false);
        $this->assertFalse($artwork->getSlug() === "false");
        $this->assertFalse($artwork->getMainImage() === "http://false.com");
        $this->assertFalse($artwork->getCategory($category) === new Category());
        $this->assertFalse($artwork->getCorpus()->contains($corpus3));
        $this->assertFalse($artwork->getCorpus()->contains($corpus4));
    }

    public function testIsEmpty(): void
    {
        $artwork = new Artwork();

        $this->assertEmpty($artwork->getRef());
        $this->assertEmpty($artwork->getWidth());
        $this->assertEmpty($artwork->getTitle());
        $this->assertEmpty($artwork->getHeight());
        $this->assertEmpty($artwork->getIsToSold());
        $this->assertEmpty($artwork->getIsSold());
        $this->assertEmpty($artwork->getPrice());
        $this->assertEmpty($artwork->getCreationDate());
        $this->assertEmpty($artwork->getCreatedAt());
        $this->assertEmpty($artwork->getDescription());
        $this->assertEmpty($artwork->getIsInCorpus());
        $this->assertEmpty($artwork->getSlug());
        $this->assertEmpty($artwork->getMainImage());
        $this->assertEmpty($artwork->getCategory());
        $this->assertEmpty($artwork->getCorpus());
    }
}
