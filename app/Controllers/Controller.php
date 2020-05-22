<?php


namespace App\Controllers;


use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Controller
{
    protected ServerRequestInterface $request;
    protected ResponseInterface $response;
    protected Blade $blade;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response, Blade $blade)
    {
        $this->request = $request;
        $this->response = $response;
        $this->blade = $blade;
    }

    protected function isAuthenticated()
    {
        $cookies = $this->request->getCookieParams();

        return isset($cookies['auth']) && $cookies['auth'] === '111';
    }
}
