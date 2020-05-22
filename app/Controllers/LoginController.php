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
        $parsedBody = $this->request->getParsedBody();
        $login = isset($parsedBody['login']) ? trim($parsedBody['login']) : '';
        $password = isset($parsedBody['password']) ? $parsedBody['password'] : '';
        $loginFailed = $login === '';
        $passwordFailed = $password === '';
        $success = $login === 'admin' && $password === '123';

        if ($loginFailed || $passwordFailed || !$success) {
            $this->response->getBody()->write(
                $this->blade->render(
                    'login', compact('login', 'password', 'loginFailed', 'passwordFailed', 'success'))
            );
            return $this->response;
        } else {
            return
                $this->response
                    ->withHeader('Set-cookie', 'auth=111')
                    ->withHeader('Location', '/');
        }
        //Конечно, нужно посмотреть пользователя в базе и при совпадении логина, пароля записать ключ в базу и в куки.
        //В дальнейшем проверять авторизацию по этому ключу. Но в задании ничего не сказано про то, что нужно хранить
        //пользователей в базе, поэтому оставляю такой костыль для экономии времени.
    }

    public function logout()
    {
        return
            $this->response
                ->withHeader('Set-cookie', 'auth=')
                ->withHeader('Location', '/');
    }
}
