<?php

namespace components;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Db
{
    public static function connection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params     =  require_once $paramsPath;

        $capsule = new Capsule;
        
        $capsule->addConnection($params);
        
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}