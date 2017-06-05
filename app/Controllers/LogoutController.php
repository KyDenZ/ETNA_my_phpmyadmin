<?php

namespace Controllers;

use App;

class LogoutController extends Controller
{
    public function index()
    {
        $this->logout();
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

//Action login - logout
}
