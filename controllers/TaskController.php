<?php

namespace controllers;

use http\Header;
use models\Task;

class TaskController
{
    public function create()
    {
        $params = [];
        
        if (isset($_POST['submit'])) {
            
            if (isset($_POST['name_user'])) {
                $params["name_user"] = htmlentities($_POST['name_user'], ENT_QUOTES, "UTF-8");
            }
            
            if (isset($_POST['email'])) {
                $params["email"] = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
            }
            
            if (isset($_POST['description'])) {
                $params["description"] = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
            }
            
            Task::createTask($params);
            
            session_flash("<strong>Отлично!</strong> Задача добавлена.", "success");
            
            header("Location: /");
        }
        
        return true;
    }
    
    public function update(int $id)
    {
        if (!check_admin()) {
            die('Вы не администратор - <a href="/admin/login">Авторизоваться</a>');
        }
        
        if ($id) {
            $task = Task::getTaskById($id);
        }
        
        $options = [];
        
        if (isset($_POST['submit'])) {
            
            if (isset($_POST['name_user'])) {
                $options["name_user"] = htmlentities($_POST['name_user'], ENT_QUOTES, "UTF-8");
            }
            
            if (isset($_POST['email'])) {
                $options["email"] = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
            }
            
            if (isset($_POST['description'])) {
                $options["description"] = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
            }

            if (isset($_POST["status"])) {
                $options["status"] = $_POST["status"];
            }
            
            if(Task::updateTaskById($id, $options)) {
                Task::updateEditedAdminAndDescription($id, $options);
                header("Location: /");
            }
        }
        
        require_once ROOT . '/views/task/update.php';
    
        return true;
    }
}