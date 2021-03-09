<?php

namespace SoureCode\Component\User\Tests\Model;

use PHPUnit\Framework\TestCase;
use SoureCode\Component\User\Model\Basic\BasicUser;

class UserAwareTraitTest extends TestCase
{
    public function testGetSetUser(): void
    {
        // Arrange
        $mock = new UserAwareMock();
        $user = new BasicUser();

        // Act and Assert
        self::assertNull($mock->getUser());
        $mock->setUser($user);
        self::assertSame($user, $mock->getUser());
    }
}
