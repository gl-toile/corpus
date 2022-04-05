<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail("true@test.com");
        $user->setPassword("password");
        $user->setFirstName("MyFirstName");
        $user->setLastName("MyLastName");
        $user->setPhoneNumber("+33611111111");
        $user->setAbout("à propos");
        $user->setInstagramAccount("myInstaAccount");

        $this->assertTrue($user->getEmail() === "true@test.com");
        $this->assertTrue($user->getPassword() === "password");
        $this->assertTrue($user->getFirstName() === "MyFirstName");
        $this->assertTrue($user->getLastName() === "MyLastName");
        $this->assertTrue($user->getPhoneNumber() === "+33611111111");
        $this->assertTrue($user->getAbout() === "à propos");
        $this->assertTrue($user->getInstagramAccount() === "myInstaAccount");
    }

    public function testIsFalse():void{
        $user = new User();

        $user->setEmail("true@test.com");
        $user->setPassword("password");
        $user->setFirstName("MyFirstName");
        $user->setLastName("MyLastName");
        $user->setPhoneNumber("+33611111111");
        $user->setAbout("à propos");
        $user->setInstagramAccount("myInstaAccount");

        $this->assertFalse($user->getEmail() === "false@test.com");
        $this->assertFalse($user->getPassword() === "false");
        $this->assertFalse($user->getFirstName() === "false");
        $this->assertFalse($user->getLastName() === "false");
        $this->assertFalse($user->getPhoneNumber() === "+33622222222");
        $this->assertFalse($user->getAbout() === "false");
        $this->assertFalse($user->getInstagramAccount() === "false");
        $this->assertFalse($user->getEmail() === "myFBAccount");
    }

    public function testIsEmpty():void{
        $user = new user();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getInstagramAccount());
    }
}
