<?php

if ( ! function_exists("route")) {
    
    function route(string $url)
    {
        if ( ! $url) {
            return false;
        }
        
        $routes = include(ROOT . "/config/routes.php");
        
        $domen = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/";
        
        foreach ($routes as $urlPattern => $path) {
            
            if (preg_match("~$urlPattern~", $url)) {
                return $domen . $url;
            }
        }
    }
}

if ( ! function_exists("session_flash")) {
    
    function session_flash(?string $message = null, $status = "success")
    {
        if ($message) {
            $_SESSION["flash"] = $message;
        } else {
            if (!empty($_SESSION["flash"])) {
              echo "<div class=\"alert alert-{$status} alert-fixed-top\">
                        {$_SESSION["flash"]}
                    </div>";
            }
            unset($_SESSION["flash"]);
        }
    }
}