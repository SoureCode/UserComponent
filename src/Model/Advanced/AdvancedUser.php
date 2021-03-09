<?php

namespace SoureCode\Component\User\Model\Advanced;

use DateTime;
use DateTimeInterface;
use SoureCode\Component\User\Model\Basic\BasicUser;

class AdvancedUser extends BasicUser implements AdvancedUserInterface
{
    protected bool $locked = false;

    protected ?DateTimeInterface $expiresAt = null;

    protected ?DateTimeInterface $credentialsExpiresAt = null;

    public function isLocked(): bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): void
    {
        $this->locked = $locked;
    }

    public function isExpired(): bool
    {
        return $this->isDateExpired($this->expiresAt);
    }

    protected function isDateExpired(?DateTimeInterface $date): bool
    {
        return null !== $date && new DateTime() >= $date;
    }

    public function getExpiresAt(): ?DateTimeInterface
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(?DateTimeInterface $timestamp): void
    {
        $this->expiresAt = $timestamp;
    }

    public function isCredentialsExpired(): bool
    {
        return $this->isDateExpired($this->credentialsExpiresAt);
    }

    public function getCredentialsExpiresAt(): ?DateTimeInterface
    {
        return $this->credentialsExpiresAt;
    }

    public function setCredentialsExpiresAt(?DateTimeInterface $timestamp): void
    {
        $this->credentialsExpiresAt = $timestamp;
    }
}
