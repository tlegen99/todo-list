<?php

namespace controllers;

class UserController
{
    private $name = "admin";
    private $password = "123";
    
    public function login()
    {
        $name = null;
        $password = null;
        
        if (isset($_POST['submit'])) {
            if ($_POST['name']) {
                $name = $_POST['name'];
            }
            
            if ($_POST['password']) {
                $password = $_POST['password'];
            }
            
            if ($name == $this->name && $password == $this->password) {
                $_SESSION['user'] = $name;
                header('Location: /admin');
            }
        }
        
        require_once ROOT . '/views/user/login.php';
        
        return true;
    }
}