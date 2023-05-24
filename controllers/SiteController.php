<?php

namespace controllers;

use models\Task;

class SiteController
{
    
    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $sortVal = $_GET['sort_val'] ?? "id";
        $sort = $_GET['sort'] ?? "DESC";

        $taskList = Task::getListTaskView($page, $sortVal, $sort);
        
        $countTaskPage = ceil(Task::getTaskCount() / Task::SHOW_BY_DEFAULT);

        require_once ROOT . '/views/site/index.php';
        
        return true;
    }
}