<?php

namespace Phro\Web\Factory;

use Exception;
use Phro\Web\Database\Database;
use Phro\Web\Model\User;

class UserFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $email, string $password, ?string $firstname, ?string $surname): void
    {

        if (self::userEmailExists($email))
        {
            throw new Exception("User already exists", 401);
        }

        $dbo = Database::getInstance();

        $sql = "INSERT INTO User (email, password, firstname, surname) VALUES (:email, :password, :firstname, :surname)";
        $stmt = $dbo->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':surname', $surname);

        $stmt->execute();

    }

    /**
     * @throws Exception
     */
    public static function selectUserByEmail(string $email): ?User
    {
        $dbo = Database::getInstance();
        $sql = "SELECT * FROM User WHERE email = :email";

        $stmt = $dbo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();

        if (!$result)
        {
            throw new Exception("User not found", 401);
        }

        return new User
        (
            $result["id"],
            $result["email"],
            $result["password"],
            $result["firstname"],
            $result["surname"]
        );

    }

    public static function userEmailExists(string $email): bool
    {
        $dbo = Database::getInstance();
        $sql = "SELECT COUNT(id) FROM User WHERE email = :email";
        $stmt = $dbo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result[0] ?? 0) > 0;
    }

    public static function userIdExists(int $id): bool
    {
        $dbo = Database::getInstance();
        $sql = "SELECT COUNT(id) FROM User WHERE id = :id";
        $stmt = $dbo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return ($result[0] ?? 0) > 0;
    }

    /**
     * @throws Exception
     */
    public static function removeUser(int $id): void
    {
        if (!self::userIdExists($id))
        {
            throw new Exception("User not found", 401);
        }
        $dbo = Database::getInstance();
        $sql = "DELETE FROM User WHERE id = :id";
        $stmt = $dbo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}