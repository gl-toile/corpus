<?php

namespace App\Tests;

use App\Entity\Artwork;
use App\Entity\Corpus;
use PHPUnit\Framework\TestCase;

class CorpusUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $corpus = new Corpus();
        
        $artwork1 = new Artwork();
        $artwork1->setTitle("Artwork1");
        
        $artwork2 = new Artwork();
        $artwork2->setTitle("Artwork2");

        $corpus->setTitle("My title");
        $corpus->setDescription("My description");
        $corpus->setSlug("My slug");
        $corpus->addArtwork($artwork1);
        $corpus->addArtwork($artwork2);

        $this->assertTrue($corpus->getTitle() === "My title");
        $this->assertTrue($corpus->getDescription() === "My description");
        $this->assertTrue($corpus->getSlug() == "My slug");
        $this->assertTrue($corpus->getArtworks()->contains($artwork1));
        $this->assertTrue($corpus->getArtworks()->contains($artwork2));
    }

    public function testIsFalse(): void
    {
        $corpus = new Corpus();
        
        $artwork1 = new Artwork();
        $artwork1->setTitle("Corpus1");
        
        $artwork2 = new Artwork();
        $artwork2->setTitle("Corpus2");

        $artwork3 = new Artwork();
        $artwork3->setTitle("Artwork3");
        $artwork4 = new Artwork();
        $artwork4->setTitle("Artwork4");

        $corpus->setTitle("My title");
        $corpus->setDescription("My description");
        $corpus->setSlug("My slug");
        $corpus->addArtwork($artwork1);
        $corpus->addArtwork($artwork2);

        $this->assertFalse($corpus->getTitle() === "false");
        $this->assertFalse($corpus->getDescription() === 0);
        $this->assertFalse($corpus->getSlug() === "false");
        $this->assertFalse($corpus->getArtworks()->contains($artwork3));
        $this->assertFalse($corpus->getArtworks()->contains($artwork4));
    }

    public function testIsEmpty(): void
    {
        $corpus = new Corpus();

        $this->assertEmpty($corpus->getTitle());
        $this->assertEmpty($corpus->getDescription());
        $this->assertEmpty($corpus->getSlug());
        $this->assertEmpty($corpus->getArtworks());
    }
}
