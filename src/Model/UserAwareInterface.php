<?php

namespace SoureCode\Component\User\Model;

use SoureCode\Component\User\Model\Basic\BasicUserInterface;

interface UserAwareInterface
{
    public function getUser(): ?BasicUserInterface;

    public function setUser(?BasicUserInterface $user): void;
}
