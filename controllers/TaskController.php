<?php

namespace controllers;
use http\Header;
use models\Task;

class TaskController
{
    public function create()
    {
        $params = [];

        $params["name_user"] = trim($_POST["name_user"]);
        $params["email"] = trim($_POST["email"]);
        $params["description"] = trim($_POST["description"]);
        
        Task::createTask($params);
        
        session_flash("<strong>Отлично!</strong> Задача добавлена.", "success");
        
        header("Location: /");
        
		return true;
    }
}