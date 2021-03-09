<?php

namespace SoureCode\Component\User\Model\Basic;

use DateTimeInterface;
use function in_array;
use SoureCode\Component\Common\Model\TimestampableTrait;
use SoureCode\Component\Common\Model\ToggleableTrait;

class BasicUser implements BasicUserInterface
{
    use TimestampableTrait;
    use ToggleableTrait;

    protected ?int $id = null;

    protected ?string $password = null;

    protected ?string $salt = null;

    protected ?string $plainPassword = null;

    protected array $roles = ['ROLE_USER'];

    protected ?string $email = null;

    protected ?string $canonicalEmail = null;

    protected ?DateTimeInterface $lastLogin = null;

    protected ?DateTimeInterface $verifiedAt = null;

    public function __construct()
    {
        $this->enabled = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function hasRole(string $role): bool
    {
        return in_array(strtoupper($role), $this->roles, true);
    }

    public function addRole(string $role): void
    {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }
    }

    public function removeRole(string $role): void
    {
        $key = array_search(strtoupper($role), $this->roles, true);

        if (false !== $key) {
            unset($this->roles[$key]);

            $this->roles = array_values($this->roles);
        }
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(?string $salt): void
    {
        $this->salt = $salt;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $password): void
    {
        $this->plainPassword = $password;
    }

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function isVerified(): bool
    {
        return null !== $this->verifiedAt;
    }

    public function getVerifiedAt(): ?DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?DateTimeInterface $timestamp): void
    {
        $this->verifiedAt = $timestamp;
    }

    public function getLastLogin(): ?DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?DateTimeInterface $timestamp): void
    {
        $this->lastLogin = $timestamp;
    }

    public function getCanonicalEmail(): ?string
    {
        return $this->canonicalEmail;
    }

    public function setCanonicalEmail(?string $email): void
    {
        $this->canonicalEmail = $email;
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }
}
