<?php


namespace App\Controllers;


class LoginController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->blade->render('login'));

        return $this->response;
    }
}
