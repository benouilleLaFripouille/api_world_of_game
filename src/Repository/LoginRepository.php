<?php


namespace Wog\Repository;


use Wog\Model\LoginModel;

class LoginRepository
{
public function __construct()
{
}

    private function getPdo(): \PDO
    {
        return new \PDO(
            "mysql:dbname=worlds_of_games;host=localhost;charset=utf8",
            "root",
            "", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }
    public function verif(LoginModel $login): array
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare(
            "SELECT * FROM `users` WHERE `email`= :email AND `password`= :password"
        );
        $sth->bindValue(":email", $login->getEmail());
        $sth->bindValue(":password", $login->getPassword());
        $sth->setFetchMode(\PDO::FETCH_CLASS, LoginModel::class);
        $sth->execute();
        $results = $sth->fetchAll();

//        var_dump($results);
        return $results;
    }
}