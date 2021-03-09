<?php

namespace SoureCode\Component\User\Encoder;

use SoureCode\Component\User\Exception\LogicException;
use SoureCode\Component\User\Model\CredentialHolderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PasswordEncoder implements PasswordEncoderInterface
{
    protected EncoderFactoryInterface $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function encode(CredentialHolderInterface $credentialHolder): string
    {
        /** @psalm-suppress InvalidArgument */
        $encoder = $this->encoderFactory->getEncoder($credentialHolder); // @phpstan-ignore-line
        $plainPassword = $credentialHolder->getPlainPassword();

        if (null === $plainPassword || '' === $plainPassword) {
            throw new LogicException('Can not encode password without plain password.');
        }

        return $encoder->encodePassword($plainPassword, $credentialHolder->getSalt());
    }
}
