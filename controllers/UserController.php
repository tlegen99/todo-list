<?php
// TODO: переделать на табличку с юзерами и ролями, проверять на админа с помощью запросов
namespace controllers;

class UserController
{
    private $name = "admin";
    private $password = "123";
    
    public function login()
    {
        if (isset($_SESSION["user"])) {
            header('Location: /');
        }
        
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
            
            if (!empty($name) && !empty($password)) {
                if ($name == $this->name && $password == $this->password) {
                    $_SESSION['user'] = $name;
                    header('Location: /');
                } else {
                    session_flash('Неправильные реквизиты доступа!', 'danger');
                }
            }
        }
        
        require_once ROOT . '/views/user/login.php';
        
        return true;
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}