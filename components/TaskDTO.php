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
        $this->nameUser = htmlentities($params["name_user"], ENT_QUOTES, "UTF-8");
        $this->email = htmlentities($params["email"], ENT_QUOTES, "UTF-8");
        $this->description = htmlentities($params["description"], ENT_QUOTES, "UTF-8");
        $this->status = $params["status"] ?? null;
    }
}