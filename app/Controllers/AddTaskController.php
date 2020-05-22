<?php


namespace App\Controllers;


class AddTaskController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->blade->render('add-task'));

        return $this->response;
    }
}
