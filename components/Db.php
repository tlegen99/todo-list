<?php

namespace components;

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params     = include($paramsPath);
        
        $dns = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db  = new \PDO($dns, $params['user'], $params['password']);
        
        return $db;
    }
}