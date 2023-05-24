<?php

namespace app\controllers;

class AccountController
{
    public function index()
    {
        view('account',['title'=>'Dashboard - Contas']);
    }
}