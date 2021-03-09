<?php

namespace SoureCode\Component\User\Tests\Model;

use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;
use SoureCode\Component\User\Model\Advanced\AdvancedUser;

class AdvancedUserTest extends TestCase
{
    public function testGetSetIsExpiresAt(): void
    {
        // Arrange
        $user = new AdvancedUser();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($user->getExpiresAt());
        self::assertFalse($user->isExpired());
        $user->setExpiresAt($timestamp);
        self::assertTrue($user->isExpired());
        self::assertSame($timestamp, $user->getExpiresAt());
        $user->setExpiresAt($timestamp->add(new DateInterval('P1D')));
        self::assertFalse($user->isExpired());
        $user->setExpiresAt($timestamp->sub(new DateInterval('P1D')));
        self::assertTrue($user->isExpired());
    }

    public function testGetSetIsCredentialsExpireAt(): void
    {
        // Arrange
        $user = new AdvancedUser();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($user->getCredentialsExpiresAt());
        self::assertFalse($user->isCredentialsExpired());
        $user->setCredentialsExpiresAt($timestamp);
        self::assertTrue($user->isCredentialsExpired());
        self::assertSame($timestamp, $user->getCredentialsExpiresAt());
        $user->setCredentialsExpiresAt($timestamp->add(new DateInterval('P1D')));
        self::assertFalse($user->isCredentialsExpired());
        $user->setCredentialsExpiresAt($timestamp->sub(new DateInterval('P1D')));
        self::assertTrue($user->isCredentialsExpired());
    }

    public function testGetSetIsLocked(): void
    {
        // Arrange
        $user = new AdvancedUser();

        // Act and Assert
        self::assertFalse($user->isLocked());
        $user->setLocked(true);
        self::assertTrue($user->isLocked());
        $user->setLocked(false);
        self::assertFalse($user->isLocked());
    }
}
