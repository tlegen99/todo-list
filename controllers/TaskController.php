<?php

namespace controllers;
use models\Task;

class TaskController
{
    public function create()
    {
        $params = [];

        $params['name_user'] = trim($_POST['name_user']);
        $params['email'] = trim($_POST['email']);
        $params['description'] = trim($_POST['description']);
        
        Task::createTask($params);
        
		return true;
    }
}