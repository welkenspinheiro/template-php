<?php

namespace app\controllers;

use app\framework\database\Connection;

class LoginController
{
    public function index()
    {
        var_dump('LOGIN CONTROLLER');
    }

    public function store()
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        if (empty($email) || empty($password)) {
            throw new \Exception("Usuario e/ou senha invalidos");
        }
        $connection = Connection::getConnection();
        $prepare = $connection->prepare("select * from users where email = :email");
        $prepare->execute(['email' => $email]);

        $userFound = $prepare->fetchObject();
        // var_dump(password_hash($password,PASSWORD_DEFAULT),$userFound->password);die;
        if (!$userFound) {
            throw new \Exception("Usuario e/ou senha invalidos");
        }
        if (!password_verify($password, $userFound->password)) {
            throw new \Exception("Usuario e/ou senha invalidos");
        }

        $_SESSION['logged'] = true;
        unset($userFound->password);
        $_SESSION['user'] = $userFound;

        return redirect('/dashboard');
    }

    public function destroy()
    {
        session_destroy();
        return redirect('/');
    }
}
