<?php

namespace Controllers;

use Models\Users;

class LogoutController extends Controller
{
    public function index()
    {
        echo "oj";
        $this->logout();
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

}
