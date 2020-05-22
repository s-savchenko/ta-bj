<?php


namespace App\Controllers;


use Philo\Blade\Blade;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Controller
{
    protected ServerRequestInterface $request;
    protected ResponseInterface $response;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response, Blade $blade)
    {
        $this->request = $request;
        $this->response = $response;
        $this->blade = $blade;
    }
}
