<?php

namespace models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    
    public const SHOW_BY_DEFAULT = 3;
    
    public static function getTaskCount()
    {
        return static::count();
    }
    
    public static function getTaskOffsetList($limit, $offset, $sortVal, $sort)
    {
        return static::orderBy($sortVal, $sort)
                   ->limit($limit)
                   ->offset($offset)
                   ->get();
    }
    
    public static function getTaskById($id)
    {
        return static::where('id', $id)->first();
    }
    
    public static function getListTaskView($page, $sortVal, $sort)
    {
        $limit  = static::SHOW_BY_DEFAULT;
        $offset = $limit * ($page - 1);
        
        return static::getTaskOffsetList($limit, $offset, $sortVal, $sort);
    }
    
    public static function getTaskStatus($id)
    {
        $task = static::getTaskById($id);
        
        if ($task["status"] == 1) {
            return "<span class=\"text-success\">Выполнено</span>";
        }
        return "<span class=\"text-danger\">В процессе</span>";
    }
    
    public static function createTask($params)
    {
        $task = new static;
        
        $task->name_user = $params->nameUser;
        $task->email = $params->email;
        $task->description = $params->description;
        
        if ($task->save()) {
            return true;
        }
        
        return false;
    }
    
    public static function updateTaskById($id, $params)
    {
        $task = static::find($id);
        
        $task->name_user = $params->nameUser;
        $task->email = $params->email;
        $task->status = $params->status;
        
        if ($task->save()) {
            return true;
        }
        
        return false;
    }
    
    public static function updateEditedAdminAndDescription($id, $params)
    {
        return static::where('id', $id)
            ->where('description', '!=' ,$params->description)
            ->update([
            'description' => $params->description,
            'edited_admin' => 1,
        ]);
    }
}