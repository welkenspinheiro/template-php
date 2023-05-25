<?php

namespace app\controllers;

use app\Models\User;

class DashboardController
{
    public function index()
    {
        $users=(new User())->getUser();
        
        view('dashboard',['title'=>'Dashboard - Home', 'users'=>$users]);
    }
}