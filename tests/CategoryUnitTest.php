<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new Category();

        $user->setTitle("My title");
        $user->setDescription("My description");
        $user->setSlug("My slug");

        $this->assertTrue($user->getTitle() === "My title");
        $this->assertTrue($user->getDescription() === "My description");
        $this->assertTrue($user->getSlug() === "My slug");
    }

    public function testIsFalse(): void
    {
        $user = new Category();

        $user->setTitle("My title");
        $user->setDescription("My description");
        $user->setSlug("My slug");

        $this->assertFalse($user->getTitle() === "false");
        $this->assertFalse($user->getDescription() === "false");
        $this->assertFalse($user->getSlug() === "false");
    }

    public function testIsEmpty(): void
    {
        $user = new Category();

        $this->assertEmpty($user->getTitle());
        $this->assertEmpty($user->getDescription());
        $this->assertEmpty($user->getSlug());
    }
}
