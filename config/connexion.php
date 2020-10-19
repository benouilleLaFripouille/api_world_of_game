<?php


function getPdo(): PDO
{
    return new PDO(
        "mysql:dbname=worlds_of_games;host=localhost;charset=utf8",
        "root",
        "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
}