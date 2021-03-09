<?php

namespace SoureCode\Component\User\Model\Advanced;

use DateTimeInterface;
use SoureCode\Component\User\Model\Basic\BasicUserInterface;

interface AdvancedUserInterface extends BasicUserInterface
{
    public function isLocked(): bool;

    public function setLocked(bool $locked): void;

    public function isExpired(): bool;

    public function getExpiresAt(): ?DateTimeInterface;

    public function setExpiresAt(?DateTimeInterface $timestamp): void;

    public function isCredentialsExpired(): bool;

    public function getCredentialsExpiresAt(): ?DateTimeInterface;

    public function setCredentialsExpiresAt(?DateTimeInterface $timestamp): void;
}
