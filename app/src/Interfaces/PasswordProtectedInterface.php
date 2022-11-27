<?php

namespace App\Interfaces;

use App\Manager\UserManager;

interface PasswordProtectedInterface
{
    public function getHashedPassword(): string;

    public function passwordMatch(string $plainPwd): bool;
}
