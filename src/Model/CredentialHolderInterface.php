<?php

namespace SoureCode\Component\User\Model;

interface CredentialHolderInterface
{
    public function getPassword(): ?string;

    public function setPassword(?string $password): void;

    public function setSalt(?string $salt): void;

    public function getSalt(): ?string;

    public function getPlainPassword(): ?string;

    public function setPlainPassword(?string $password): void;

    public function eraseCredentials(): void;
}
