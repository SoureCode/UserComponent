<?php

namespace SoureCode\Component\User\Updater;

use SoureCode\Component\User\Model\CredentialHolderInterface;

interface PasswordUpdaterInterface
{
    public function update(CredentialHolderInterface $credentialHolder): void;
}
