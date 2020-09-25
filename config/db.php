<?php

class DB
{

    const USER = "root";
    const PASS = '';
    const HOST = "localhost";
    const DB = "library";

    public static function connectToDB()
    {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $connect = new PDO("mysql:dbname=$db;host=$host;charset=UTF8;", $user, $pass);

        return $connect;

    }
}
