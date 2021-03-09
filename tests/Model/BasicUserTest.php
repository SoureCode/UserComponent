<?php

namespace SoureCode\Component\User\Tests\Model;

use DateTime;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SoureCode\Component\User\Model\Basic\BasicUser;
use SoureCode\Component\User\Model\Basic\BasicUserInterface;

class BasicUserTest extends TestCase
{
    public function testIsInstanceOfBasicUserInterface(): void
    {
        self::assertInstanceOf(BasicUserInterface::class, new BasicUser());
    }

    public function testGetSetPassword(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($user->getPassword());
        $user->setPassword('foo');
        self::assertSame('foo', $user->getPassword());
    }

    public function testGetSetPlainPassword(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($user->getPlainPassword());
        $user->setPlainPassword('foo');
        self::assertSame('foo', $user->getPlainPassword());
    }

    public function testEraseCredentials(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        $user->setPlainPassword('foo');
        self::assertSame('foo', $user->getPlainPassword());
        $user->eraseCredentials();
        self::assertNull($user->getPlainPassword());
    }

    public function testGetSetLastLogin(): void
    {
        // Arrange
        $user = new BasicUser();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($user->getLastLogin());
        $user->setLastLogin($timestamp);
        self::assertSame($timestamp, $user->getLastLogin());
    }

    public function testGetSetIsVerifiedAt(): void
    {
        // Arrange
        $user = new BasicUser();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($user->getVerifiedAt());
        self::assertFalse($user->isVerified());
        $user->setVerifiedAt($timestamp);
        self::assertTrue($user->isVerified());
        self::assertSame($timestamp, $user->getVerifiedAt());
    }

    public function testGetSetEmail(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($user->getEmail());
        $user->setEmail('foo');
        self::assertSame('foo', $user->getEmail());
    }

    public function testGetSetSalt(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($user->getSalt());
        $user->setSalt('foo');
        self::assertSame('foo', $user->getSalt());
    }

    public function testGetId(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($user->getId());

        $reflectionClass = new ReflectionClass($user);
        $idProperty = $reflectionClass->getProperty('id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($user, 8);

        self::assertSame(8, $user->getId());
    }

    public function testAddRemoveHasGetRole(): void
    {
        // Arrange
        $user = new BasicUser();

        // Act and Assert
        self::assertCount(1, $user->getRoles());
        self::assertContains('ROLE_USER', $user->getRoles());
        self::assertTrue($user->hasRole('ROLE_USER'));
        self::assertFalse($user->hasRole('role_bar'));

        $user->addRole('role_bar');

        self::assertTrue($user->hasRole('ROLE_USER'));
        self::assertTrue($user->hasRole('role_BAR'));
        self::assertContains('ROLE_BAR', $user->getRoles());

        $user->removeRole('role_BAR');

        self::assertCount(1, $user->getRoles());
        self::assertContains('ROLE_USER', $user->getRoles());
        self::assertTrue($user->hasRole('ROLE_USER'));
        self::assertFalse($user->hasRole('ROLE_bar'));
    }
}
