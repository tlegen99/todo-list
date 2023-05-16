<?php

namespace models;

use components\Db;

class Task
{
    public const SHOW_BY_DEFAULT = 3;
    
    public static function getTaskCount()
    {
        $connect = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM task";
        $query = $connect->prepare($sql);
        $query->execute();
        
        return $query->fetchColumn();
    }
    
    public static function getTaskOffsetList($limit, $offset)
    {
        $connect = Db::getConnection();

        $sql = "SELECT id, name_user, email, description, status FROM task ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}";
        $query = $connect->prepare($sql);
        $query->execute();
        
        $taskList = [];
        
        foreach ($query->fetchAll() as $key => $row) {
            $taskList[$key]["id"]          = $row["id"];
            $taskList[$key]["name_user"]   = $row["name_user"];
            $taskList[$key]["email"]       = $row["email"];
            $taskList[$key]["description"] = $row["description"];
            $taskList[$key]["status"]      = $row["status"];
        }
        
        return $taskList;
    }
    
    public static function getListTaskView($page)
    {
        $limit  = self::SHOW_BY_DEFAULT;
        $offset = $limit * ($page - 1);

        return self::getTaskOffsetList($limit, $offset);
    }
    
    
    public static function createTask($params)
    {
        $connect = Db::getConnection();
        
        $sql    = "INSERT task (name_user, email, description) VALUES (:name_user, :email, :description)";
        $result = $connect->prepare($sql);
        $result->bindParam(':name_user', $params['name_user'], \PDO::PARAM_STR);
        $result->bindParam(':email', $params['email'], \PDO::PARAM_STR);
        $result->bindParam(':description', $params['description'], \PDO::PARAM_STR);
        
        if ($result->execute()) {
            return $connect->lastInsertId();
        }
        
        return 0;
    }
}