<?php


namespace App\Controllers;


use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $this->response->getBody()->write($this->blade->render('task'));

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

    private function validate(string $user_name, string $email, string $content): bool
    {
        $userNameFailed = $user_name === '';
        $emailFailed = !filter_var($email, FILTER_VALIDATE_EMAIL);
        $contentFailed = $content === '';

        $failed = $userNameFailed || $emailFailed || $contentFailed;

        if ($failed) {
            $isAuthenticated = $this->isAuthenticated();
            $this->response->getBody()->write(
                $this->blade->render('task', compact('user_name', 'email', 'content', 'userNameFailed',
                    'emailFailed', 'contentFailed', 'isAuthenticated'))
            );
        }

        return !$failed;
    }

    public function edit()
    {
        if (!$this->isAuthenticated()) {
            return $this->response->withStatus(403);
        }

        $query = $this->request->getQueryParams();
        /** @var Task $task */
        $task = isset($query['id']) ? Task::find($query['id']) : null;
        if ($task) {
            $params = $task->attributesToArray();
            $params['isAuthenticated'] = $this->isAuthenticated();
            $this->response->getBody()->write(
                $this->blade->render('task', $params)
            );
            return $this->response;
        } else {
            return $this->response->withStatus(404);
        }
    }

    public function update()
    {
        if (!$this->isAuthenticated()) {
            return $this->response->withStatus(403);
        }

        $query = $this->request->getQueryParams();
        /** @var Task $task */
        $task = isset($query['id']) ? Task::find($query['id']) : null;
        if ($task) {
            $parsedBody = $this->request->getParsedBody();
            $task->user_name = isset($parsedBody['user_name']) ? trim($parsedBody['user_name']) : '';
            $task->email = isset($parsedBody['email']) ? trim($parsedBody['email']) : '';
            $task->content = isset($parsedBody['content']) ? trim($parsedBody['content']) : '';
            $task->status = isset($parsedBody['done']) ? Task::STATUS_DONE : Task::STATUS_NEW;
            if ($this->validate($task->user_name, $task->email, $task->content)) {
                $task->save();
                return $this->response->withHeader('Location', '/');
            }
            return $this->response;
        } else {
            return $this->response->withStatus(404);
        }
    }
}
