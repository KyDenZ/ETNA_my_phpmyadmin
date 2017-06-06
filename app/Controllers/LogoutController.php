<?php

namespace Controllers;

use Lib\Route;

class LogoutController extends Controller
{
    public function index()
    {
        $this->logout();
    }

    public function logout()
    {
        session_destroy();
        redirect_to("/");
    }

//Action login - logout
}
