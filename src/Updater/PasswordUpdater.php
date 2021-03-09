<?php

namespace SoureCode\Component\User\Updater;

use SoureCode\Component\User\Encoder\PasswordEncoderInterface;
use SoureCode\Component\User\Model\CredentialHolderInterface;

class PasswordUpdater implements PasswordUpdaterInterface
{
    protected PasswordEncoderInterface $passwordEncoder;

    public function __construct(PasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function update(CredentialHolderInterface $credentialHolder): void
    {
        $plainPassword = $credentialHolder->getPlainPassword();

        if (null !== $plainPassword && '' !== $plainPassword) {
            $credentialHolder->setPassword($this->passwordEncoder->encode($credentialHolder));
            $credentialHolder->eraseCredentials();
        }
    }
}
