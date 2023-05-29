<?php

namespace controllers;

use components\TaskDTO;
use http\Header;
use models\Task;

class TaskController
{
    public function create()
    {
        $params = [];
        
        if (isset($_POST['submit'])) {
            
            $params = new TaskDTO($_POST);
            
            if (Task::createTask($params)) {
                session_flash("<strong>Отлично!</strong> Задача добавлена.", "success");
                header("Location: /");
            }
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
        
        if (isset($_POST['submit'])) {
            
            $params = new TaskDTO($_POST);

            if(Task::updateTaskById($id, $params)) {
                Task::updateEditedAdminAndDescription($id, $params);
                
                session_flash("<strong>Отлично!</strong> Задача отредактирована.", "success");
                header("Location: /");
            }
        }
        
        require_once ROOT . '/views/task/update.php';
    
        return true;
    }
}