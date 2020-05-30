<?php


namespace App\Controllers;


use Kernel\Template\RenderInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Controller
{
    protected ServerRequestInterface $request;
    protected ResponseInterface $response;
    protected RenderInterface $renderer;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response, RenderInterface $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
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
