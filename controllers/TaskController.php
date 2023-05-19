<?php

namespace controllers;

use http\Header;
use models\Task;

class TaskController
{
    public function create()
    {
        $params = [];
        
        if ($_POST['name_user']) {
            $params["name_user"] = htmlentities($_POST['name_user'], ENT_QUOTES, "UTF-8");
        }
        
        if ($_POST['email']) {
            $params["email"] = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
        }
        
        if ($_POST['description']) {
            $params["description"] = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
        }
        
        Task::createTask($params);
        
        session_flash("<strong>Отлично!</strong> Задача добавлена.", "success");
        
        header("Location: /");
        
        return true;
    }
}