<?php


namespace App\Controllers;


class MainPageController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->blade->render('main'));

        return $this->response;
    }
}
