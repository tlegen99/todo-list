<?php

namespace controllers;

use models\Task;

class SiteController
{
    
    public function index()
    {
        $page = 1;
        $countTaskPage = ceil(Task::getTaskCount() / Task::SHOW_BY_DEFAULT);
        
        require_once ROOT . '/views/site/index.php';
        
        return true;
    }
    
    public function todoAjax($page = 1)
    {
        $taskList = Task::getListTaskView($page);
        
        require_once ROOT . '/views/include/todo-ajax.php';
    }
}