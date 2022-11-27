<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{

    /**
     * @return User[]
     */
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from User");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function getByUsername($user): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $query->bindValue("username", $user, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function getById($user): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE id = :id");
        $query->bindValue("id", $user, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO User (password, username, email, access) VALUES (:password, :username, :email, :access)");
        $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue("access", $user->getAccess(), \PDO::PARAM_STR);
        $query->execute();
    }
}
