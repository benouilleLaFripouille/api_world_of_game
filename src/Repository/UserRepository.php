<?php


namespace Wog\Repository;


use mysql_xdevapi\Exception;
use Wog\Model\LoginModel;
use Wog\Model\UserModel;

class UserRepository
{

    public function __construct()
    {
    }

    private function getPdo(): \PDO
    {
        return new \PDO(
            "mysql:dbname=worlds_of_game;host=localhost;charset=utf8",
            "root",
            "", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * @param UserModel $user
     *
     * @throws \PDOException for user exists or errors
     */
    public function insert(UserModel $user): void
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare(
            "INSERT INTO `users`(
            `surname`, `first_name`, `last_name`,
            `email`, `phone`, `adress`,
            `city`, `zip`, `password`, `token`)
            VALUES
            (:surname,:first_name,:last_name,
             :email,:phone,:adress,
             :city,:zip,:password, :token)"
        );

        $sth->bindValue(":surname", $user->getSurname());
        $sth->bindValue(":first_name", $user->getFirstName());
        $sth->bindValue(":last_name", $user->getLastName());
        $sth->bindValue(":email", $user->getEmail());
        $sth->bindValue(":phone", $user->getPhone());
        $sth->bindValue(":adress", $user->getAdress());
        $sth->bindValue(":city", $user->getCity());
        $sth->bindValue(":zip", $user->getZip());
        $sth->bindValue(":password", $user->getPassword());
//        $sth->bindValue(":password", password_hash($user->getPassword(), PASSWORD_DEFAULT));
        $sth->bindValue(":token", $user->getToken());
        $sth->execute();
    }

    public function select(): array
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare(
            "SELECT * FROM `users`"
        );
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserModel::class);
        $sth->execute();
        $results = $sth->fetchAll();
        return $results;
    }

    public function selectByEmail(
        string $email
    ): UserModel
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare(
            "SELECT * FROM `users` WHERE `email`= :email"
        );
        $sth->bindValue(":email", $email);
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserModel::class);
        $sth->execute();
        $results = $sth->fetch();

//        var_dump($results);
        return $results;

    }
}