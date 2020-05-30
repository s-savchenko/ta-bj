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

        return isset($cookies['auth']) && $cookies['auth'] === getenv('AUTH_KEY');
    }

    protected function getPostParam(string $name): string
    {
        return isset($this->request->getParsedBody()[$name]) ? $this->request->getParsedBody()[$name] : '';
    }

    protected function getQueryParam(string $name, $defaultValue = null)
    {
        $query = $this->request->getQueryParams();

        return isset($query[$name]) ? $query[$name] : $defaultValue;
    }

    protected function redirect(string $location): ResponseInterface
    {
        return $this->response->withStatus(301)->withHeader('Location', $location);
    }
}
