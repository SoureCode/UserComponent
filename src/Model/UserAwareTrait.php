<?php

namespace SoureCode\Component\User\Model;

use SoureCode\Component\User\Model\Basic\BasicUserInterface;

trait UserAwareTrait
{
    protected ?BasicUserInterface $user = null;

    public function getUser(): ?BasicUserInterface
    {
        return $this->user;
    }

    public function setUser(?BasicUserInterface $user): void
    {
        $this->user = $user;
    }
}
