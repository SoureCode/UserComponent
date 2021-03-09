<?php

namespace SoureCode\Component\User\Tests\Model;

use SoureCode\Component\User\Model\UserAwareInterface;
use SoureCode\Component\User\Model\UserAwareTrait;

class UserAwareMock implements UserAwareInterface
{
    use UserAwareTrait;
}
