<?php

namespace controllers;

use models\Task;

class SiteController
{
    
    public function index()
    {
        $page = $_GET['page'] ?? 1;

        $taskList = Task::getListTaskView($page);
        $countTaskPage = ceil(Task::getTaskCount() / Task::SHOW_BY_DEFAULT);
        
        require_once ROOT . '/views/site/index.php';
        
        return true;
    }
}