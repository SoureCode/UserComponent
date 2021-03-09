<?php

namespace SoureCode\Component\User\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraints\Compound;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[Attribute]
class PasswordRequirements extends Compound
{
    protected function getConstraints(array $options): array
    {
        return [
            new NotCompromisedPassword(
                [
                    'message' => 'sourecode.user.validator.password.compromised',
                ]
            ),
            new Regex(
                [
                    'message' => 'sourecode.user.validator.password.lowercase',
                    'pattern' => '/[a-z]+/',
                ]
            ),
            new Regex(
                [
                    'message' => 'sourecode.user.validator.password.uppercase',
                    'pattern' => '/[A-Z]+/',
                ]
            ),
            new Regex(
                [
                    'message' => 'sourecode.user.validator.password.number',
                    'pattern' => '/[0-9]+/',
                ]
            ),
            new Regex(
                [
                    'message' => 'sourecode.user.validator.password.special',
                    'pattern' => '/[^a-zA-Z0-9]+/',
                ]
            ),
            new Length(
                [
                    'min' => 8,
                    'minMessage' => 'sourecode.user.validator.password.min',
                    'maxMessage' => 'sourecode.user.validator.password.max',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]
            ),
        ];
    }
}
