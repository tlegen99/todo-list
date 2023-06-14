<?php
// TODO: переделать на табличку с юзерами и ролями, проверять на админа с помощью запросов
namespace controllers;
use models\User;

class UserController
{
    private $name = "admin";
    private $password = "123";
    
    public function index()
    {
        require_once ROOT . '/views/user/index.php';
        
        return true;
    }
    
    public function login()
    {
        if (isset($_SESSION["user"])) {
            header('Location: /');
        }
        
        $name = null;
        $password = null;
        $errorName = null;
        $errorPass = null;
        
        if (isset($_POST['submit'])) {
            
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            if (!User::checkUserName($name)) {
                $errorName = 'поле "Логин пользователя" обязательно для заполнения';
            }
            
            if (!User::checkUserPass($password)) {
                $errorPass = 'поле "Пароль" обязательно для заполнения';
            }
            
            if (!isset($errorName) && !isset($errorPass)) {
                
                $userId = User::checkUserData($name, $password);
                
                if ($userId === false) {
                    session_flash('Неправильные реквизиты доступа!', 'danger');
                } else {
                    $_SESSION['user'] = $userId;
                    header('Location: /');
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