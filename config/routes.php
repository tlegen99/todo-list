<?php

return [
    'users' => 'user/index',
    
    'task/update/([0-9]+)' => 'Task/update/$1',
    'task/create' => 'Task/create',
    
    'admin/logout' => 'user/logout',
    'admin/login' => 'user/login',
    
    '' => 'Site/index',
];
