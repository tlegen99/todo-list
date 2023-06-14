<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    
    public static function checkUserName(string $name): bool|string
    {
        if ( ! empty($name)) {
            return true;
        }
        
        return false;
    }
    
    public static function checkUserPass(int $password): bool|string
    {
        if ( ! empty($password)) {
            return true;
        }
        
        return false;
    }
    
    public static function checkUserData($name, $password)
    {
        $user = static::where("nick_name", $name)
                        ->where("password", $password)
                        ->first();
        if ($user) {
            return $user['id'];
        }
        
        return false;
    }
}