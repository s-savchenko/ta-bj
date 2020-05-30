<?php


namespace App\Controllers;


class LoginController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->blade->render('login'));

        return $this->response;
    }

    public function login()
    {
        $login = trim($this->getPostParam('login'));
        $password = $this->getPostParam('password');
        $loginFailed = $login === '';
        $passwordFailed = $password === '';
        $success = $login === getenv('PRIVATEAREA_LOGIN') && $password === getenv('PRIVATEAREA_PASSWORD');

        if ($loginFailed || $passwordFailed || !$success) {
            $this->response->getBody()->write(
                $this->blade->render(
                    'login', compact('login', 'password', 'loginFailed', 'passwordFailed', 'success'))
            );
            return $this->response;
        } else {
            return
                $this->response
                    ->withHeader('Set-cookie', 'auth=' . getenv('AUTH_KEY'))
                    ->withStatus(301)
                    ->withHeader('Location', '/');
        }
    }

    public function logout()
    {
        return
            $this->response
                ->withHeader('Set-cookie', 'auth=')
                ->withStatus(301)
                ->withHeader('Location', '/');
    }
}
