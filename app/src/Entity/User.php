<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;
use App\Manager\UserManager;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $access;

    /**
     * @param int|null $id
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $access
     */


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function setId(?int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccess(): string
    {
        return $this->access;
    }

    /**
     * @param string $access
     * @return User
     */
    public function setAccess(string $access): User
    {
        $this->access = 'User';
        return $this;
    }


    public function getHashedPassword(): string
    {
        return 'coucou';
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return password_verify($plainPwd, $this->password);
    }

    public function passwordHash(string $password): User
    {
        $this->password = password_hash($password,  PASSWORD_DEFAULT );
        return $this;
    }
}
