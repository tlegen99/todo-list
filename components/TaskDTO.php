<?php

namespace components;

class TaskDTO
{
    public $nameUser;
    public $email;
    public $description;
    public $status;
    
    public function __construct($params)
    {
        $nameUser = htmlentities($params["name_user"], ENT_QUOTES, "UTF-8");
        $email = htmlentities($params["email"], ENT_QUOTES, "UTF-8");
        $description = htmlentities($params["description"], ENT_QUOTES, "UTF-8");
        $status = $params["status"] ?? null;
        
        $this->nameUser = trim($nameUser);
        $this->email = trim($email);
        $this->description = trim($description);
        $this->status = trim($status);
    }
}