<?php


namespace App\Controllers;


use App\Models\Task;

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
        $user_name = isset($parsedBody['user_name']) ? trim($parsedBody['user_name']) : '';
        $email = isset($parsedBody['email']) ? trim($parsedBody['email']) : '';
        $content = isset($parsedBody['content']) ? trim($parsedBody['content']) : '';

        if ($this->validate($user_name, $email, $content)) {
            Task::create(compact('user_name', 'email', 'content'));
            return $this->response->withHeader('Location', '/');
        }

        return $this->response;
    }

    private function validate(string $userName, string $email, string $content): bool
    {
        $userNameFailed = $userName === '';
        $emailFailed = !filter_var($email, FILTER_VALIDATE_EMAIL);
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
