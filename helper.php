<?php

if ( ! function_exists("route")) {
    
    function route(string $url)
    {
        if ( ! $url) {
            return false;
        }
        
        $routes = include(ROOT . '/config/routes.php');
        
        $domen = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';

        foreach ($routes as $urlPattern => $path) {
            
            if (preg_match("~$urlPattern~", $url)) {
                return $domen . $url;
            }
        }
    }
}