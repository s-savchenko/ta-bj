<?php


namespace App\Controllers;


class AddTaskController extends Controller
{
    public function index()
    {
        $this->response->getBody()->write($this->blade->render('add-task'));

        return $this->response;
    }

    public function store()
    {
        $parsedBody = $this->request->getParsedBody();
        $userName = isset($parsedBody['user_name']) ? trim($parsedBody['user_name']) : '';
        $email = isset($parsedBody['email']) ? trim($parsedBody['email']) : '';
        $content = isset($parsedBody['content']) ? trim($parsedBody['content']) : '';

        $userNameFailed = $userName === '';
        $emailFailed = $email === '';
        $contentFailed = $content === '';

        if ($userNameFailed || $emailFailed || $contentFailed) {
            $this->response->getBody()->write(
                $this->blade->render('add-task', compact('userName', 'email', 'content', 'userNameFailed',
                    'emailFailed', 'contentFailed'))
            );
        }

        return $this->response;
    }
}
