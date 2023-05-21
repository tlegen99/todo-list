<?php

namespace controllers;

class UserController
{
    private $name = "admin";
    private $password = "123";
    
    public function login()
    {
        $name = '';
        $password = '';
        $errorName = '';
        $errorPass = '';
        
        if (isset($_POST['submit'])) {
            
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            if (empty($name)) {
                $errorName = 'поле "Логин пользователя" обязательно для заполнения';
            }
            
            if (empty($password)) {
                $errorPass = 'поле "Пароль" обязательно для заполнения';
            }
            
            if (!empty($name) || !empty($password)) {
                if ($name == $this->name && $password == $this->password) {
                    $_SESSION['user'] = $name;
                    header('Location: /admin');
                } else {
                    session_flash('Неправильные реквизиты доступа!', 'danger');
                }
            }
        }
        
        require_once ROOT . '/views/user/login.php';
        
        return true;
    }
}