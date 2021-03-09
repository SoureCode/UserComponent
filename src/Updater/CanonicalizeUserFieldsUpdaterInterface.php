<?php

namespace SoureCode\Component\User\Updater;

use SoureCode\Component\User\Model\Basic\BasicUserInterface;

interface CanonicalizeUserFieldsUpdaterInterface
{
    public function update(BasicUserInterface $user): void;

    public function canonicalizeEmail(?string $email): ?string;
}
