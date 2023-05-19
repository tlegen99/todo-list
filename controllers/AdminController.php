<?php

namespace controllers;

class AdminController
{
    public function index()
    {
        
        require_once ROOT . '/views/admin/index.php';
        
        return true;
    }
}