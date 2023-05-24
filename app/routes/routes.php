<?php

return [
    'get' => [
        '/' => 'HomeController@index',
        '/login' => 'LoginController@index',
        '/dashboard' => 'DashboardController@index:auth',
        '/dashboard/account' => 'AccountController@index:auth',
        '/logout' => 'LoginController@destroy',
    ],
    'post' => [
        '/login' => 'LoginController@store'
    ]
];
