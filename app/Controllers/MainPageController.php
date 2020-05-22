<?php


namespace App\Controllers;


use App\Models\Task;

class MainPageController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $this->response->getBody()->write($this->blade->render('main', compact('tasks')));

        return $this->response;
    }
}
