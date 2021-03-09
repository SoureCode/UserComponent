<?php

namespace SoureCode\Component\User\Encoder;

use SoureCode\Component\User\Model\CredentialHolderInterface;

interface PasswordEncoderInterface
{
    public function encode(CredentialHolderInterface $credentialHolder): string;
}
