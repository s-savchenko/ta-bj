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

        if ($this->validate($userName, $email, $content)) {
            //save
        }

        return $this->response;
    }

    private function validate(string $userName, string $email, string $content): bool
    {
        $userNameFailed = $userName === '';
        $emailFailed = $email === '';
        $contentFailed = $content === '';

        $failed = $userNameFailed || $emailFailed || $contentFailed;

        if ($failed) {
            $this->response->getBody()->write(
                $this->blade->render('add-task', compact('userName', 'email', 'content', 'userNameFailed',
                    'emailFailed', 'contentFailed'))
            );
        }

        return !$failed;
    }
}
