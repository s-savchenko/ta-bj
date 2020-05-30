<?php


namespace App\Controllers;


class LoginController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->renderer->render('login'));

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
                $this->renderer->render(
                    'login', compact('login', 'password', 'loginFailed', 'passwordFailed', 'success'))
            );
            return $this->response;
        } else {
            return $this->redirect('/')->withHeader('Set-cookie', 'auth=' . getenv('AUTH_KEY'));
        }
    }

    public function logout()
    {
        return $this->redirect('/')->withHeader('Set-cookie', 'auth=');
    }
}
