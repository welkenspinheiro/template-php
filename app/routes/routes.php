<?php

return [
    'get' => [
        '/' => 'HomeController@index',
        '/login' => 'LoginController@index',
        '/dashboard' => 'DashboardController@index:auth',
    ],
    'post' => [
        '/login' => 'LoginController@store'
    ]
];
