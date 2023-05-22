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
    
    public static function getTaskOffsetList($limit, $offset, $sortVal, $sort)
    {
        $connect = Db::getConnection();

        $sql = "SELECT id, name_user, email, description, status FROM task ORDER BY {$sortVal} {$sort} LIMIT {$limit} OFFSET {$offset}";
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
    
    public static function getTaskById($id)
    {
        $connect = Db::getConnection();

        $sql = "SELECT id, name_user, email, description, status FROM task where id = {$id}";
        $query = $connect->prepare($sql);
        $query->execute();
        
        $task = [];
        $row = $query->fetch();
        
        $task["id"]          = $row["id"];
        $task["name_user"]   = $row["name_user"];
        $task["email"]       = $row["email"];
        $task["description"] = $row["description"];
        $task["status"]      = $row["status"];
        
        return $task;
    }
    
    public static function getListTaskView($page, $sortVal, $sort)
    {
        $limit  = self::SHOW_BY_DEFAULT;
        $offset = $limit * ($page - 1);

        return self::getTaskOffsetList($limit, $offset, $sortVal, $sort);
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
    
    public static function updateTaskById($id, $params)
    {
        $connect = Db::getConnection();
        
        $sql    = "UPDATE task SET name_user = :name_user, email = :email, description = :description WHERE id = :id";
        $result = $connect->prepare($sql);
//        $result->bindParam(':status', 1, \PDO::PARAM_INT);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':name_user', $params['name_user'], \PDO::PARAM_STR);
        $result->bindParam(':email', $params['email'], \PDO::PARAM_STR);
        $result->bindParam(':description', $params['description'], \PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function editTaskStatus() {
    
    }
}