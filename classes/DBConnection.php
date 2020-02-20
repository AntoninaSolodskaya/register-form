<?php

include "Config.php";

class DBConnection
{

    /** @var PDO */
    protected static $connection;

    public static function getConnection()
    {
        if (self::$connection) {
            return self::$connection;
        }

        $dbName = Config::DB_NAME;
        $username = Config::DB_USERNAME;
        $password = Config::DB_PASSWORD;
        $hostname = Config::DB_HOST;

        self::$connection = new PDO(
            'mysql:host=' . $hostname . '; dbname=' . $dbName,
            $username, $password
        );

        return self::$connection;
    }
}
