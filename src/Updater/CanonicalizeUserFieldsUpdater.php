<?php

namespace SoureCode\Component\User\Updater;

use SoureCode\Component\Common\Canonicalizer\CanonicalizerInterface;
use SoureCode\Component\User\Model\Basic\BasicUserInterface;

class CanonicalizeUserFieldsUpdater implements CanonicalizeUserFieldsUpdaterInterface
{
    protected CanonicalizerInterface $emailCanonicalizer;

    public function __construct(CanonicalizerInterface $emailCanonicalizer)
    {
        $this->emailCanonicalizer = $emailCanonicalizer;
    }

    public function update(BasicUserInterface $user): void
    {
        $user->setCanonicalEmail($this->canonicalizeEmail($user->getEmail()));
    }

    public function canonicalizeEmail(?string $email): ?string
    {
        return $this->emailCanonicalizer->canonicalize($email);
    }
}
