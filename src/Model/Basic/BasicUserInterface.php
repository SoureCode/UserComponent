<?php

namespace SoureCode\Component\User\Model\Basic;

use DateTimeInterface;
use SoureCode\Component\Common\Model\ResourceInterface;
use SoureCode\Component\Common\Model\TimestampableInterface;
use SoureCode\Component\Common\Model\ToggleableInterface;
use SoureCode\Component\User\Model\CredentialHolderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface BasicUserInterface extends ResourceInterface, ToggleableInterface, CredentialHolderInterface, UserInterface, TimestampableInterface
{
    public function getId(): ?int;

    public function getRoles(): array;

    public function hasRole(string $role): bool;

    public function addRole(string $role): void;

    public function removeRole(string $role): void;

    public function getEmail(): ?string;

    public function setEmail(?string $email): void;

    public function getCanonicalEmail(): ?string;

    public function setCanonicalEmail(?string $email): void;

    public function isVerified(): bool;

    public function getVerifiedAt(): ?DateTimeInterface;

    public function setVerifiedAt(?DateTimeInterface $timestamp): void;

    public function getLastLogin(): ?DateTimeInterface;

    public function setLastLogin(?DateTimeInterface $timestamp): void;
}
