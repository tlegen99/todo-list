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
            if ( ! empty($_SESSION["flash"])) {
                echo "<div class=\"alert alert-{$status} alert-fixed-top\">
                        {$_SESSION["flash"]}
                    </div>";
            }
            unset($_SESSION["flash"]);
        }
    }
}

if ( ! function_exists("route_pagination")) {
    
    function route_pagination(int $page)
    {
        $params = $_GET ?? [];
        unset($params["page"]);
        
        $getSort = http_build_query($params);
        
        return route('?page=' . $page . '&' . $getSort);
    }
}

if ( ! function_exists("option_task")) {
    
    function option_task()
    {
        $options = [
            [
                "text"     => "имя пользователя",
                "sort_val" => "name_user",
                "sort"     => "asc",
            ],
            [
                "text"     => "email",
                "sort_val" => "email",
                "sort"     => "desc",
            ],
            [
                "text"     => "статус",
                "sort_val" => "status",
                "sort"     => "asc",
            ],
        ];
        
        $html = "";
        
        foreach ($options as $option) {
            
            $selected = null;
            if ($_GET["sort_val"] == $option["sort_val"]) {
                $selected = " selected";
                
                if ($_GET["sort"] == "asc") {
                    $option["sort"] = "desc";
                } else {
                    $option["sort"] = "asc";
                }
            }
            
            $url  = route("?sort_val=" . $option["sort_val"] . "&sort=" . $option["sort"]);
            $html .= "<option value=\"{$url}\"{$selected}>" . $option["text"] . "</option>";
        }
        
        return $html;
    }
}