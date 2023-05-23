<?php

return [
    'get' => [
        '/'=>'HomeController@index',
        '/login'=>'LoginController@index',
        '/dashboard'=>'DashboardController@index',
    ],
    'post' => [
        '/login' => 'LoginController@store'
    ]
];
