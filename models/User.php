<?php

namespace models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    
    public function getUser()
    {
        return static::all();
    }
}