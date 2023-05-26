<?php

namespace components;

class Router
{
    private $routes;
    
    public function __construct()
    {
        $routesPath   = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    public function run()
    {
        $url = $this->getUrl();
        $url = preg_replace('~\?(.+?)$~isu', '', $url);
        
        $this->errorPage($url);
        
        foreach ($this->routes as $urlPattern => $path) {
            
            if (preg_match("~$urlPattern~", $url)) {
                
                $internalRoute = preg_replace("~$urlPattern~", $path, $url);
                
                $data = explode('/', $internalRoute);
                
                $class  = array_shift($data) . 'Controller';
                $class  = ucfirst($class);
                $method = array_shift($data);
                
                $parameters = $data;
                
                $classFile = ROOT . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class . '.php';
                
                if (file_exists($classFile)) {
                    $className   = '\controllers\\' . $class;
                    $classObject = new $className();
                    
                    if (method_exists($classObject, $method)) {
                        $result = call_user_func_array([$classObject, $method], $parameters);
                        
                        if ($result != null) {
                            break;
                        }
                    }
                }
            }
        }
    }
    
    public function getUrl()
    {
        if ( ! empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function errorPage(string $url)
    {
        if ( ! isset($this->routes[$url])) {
            header('HTTP/1.0 404 Not Found', true, 404);
            echo 'Ошибка 404. Страница не найдена. Вернуться на <a href="/">главную</a>?';
            return false;
        }
    }
}