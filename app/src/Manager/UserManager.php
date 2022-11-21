<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{

    /**
     * @return User[]
     */
    public function getAllUsers()
    {
        $query = $this->pdo->query("select * from User");
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getByMail(string $email): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
        $query->bindValue("email", $email, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function getPwd(string $email)
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
        $query->bindValue("email", $email, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return $data;
        }

        return null;
    }

    public function getById(string $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function verifyMail(string $mail)
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
        $query->bindValue("email", $mail, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        if(!$data) {
            return true;
        }
        return false;
    }

    public function updateUser($user, $id): void
    {
        $query = $this->pdo->prepare("UPDATE User SET (username, password, email, admin) VALUES (:username, :password, :email, :admin) WHERE 'id' = $id");
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue("admin", $user->getAdmin(), \PDO::PARAM_INT);
        $query->execute();
    }

    public function insertUser(User $user): int
    {
        $query = $this->pdo->prepare("INSERT INTO User (username, password, email, admin) VALUES (:username, :password, :email, :admin)");
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue("admin", $user->getAdmin(), \PDO::PARAM_INT);
        $query->execute();

        return $this->pdo->lastInsertId();
    }
}
