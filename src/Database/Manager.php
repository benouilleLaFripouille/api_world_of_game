<?php


namespace Wog\Database;


class Manager
{

    private static

        /**
         * @var \PDO
         */
        $connection;

    public function __construct()
    {
        Manager::$connection = new \PDO(
            "mysql:host=127.0.0.1;port=8889;dbname=worlds_of_game;charset=utf8",
            "root",
            "root", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * @return \PDO
     */
    public static function getConnection(): \PDO
    {
        if (!Manager::$connection) {
            new Manager;
        }
        return Manager::$connection;
    }

}