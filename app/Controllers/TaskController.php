<?php


namespace App\Controllers;


use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $this->response->getBody()->write(
            $this->renderer->render('task', [
                'task' => new Task(),
                'isAuthenticated' => $this->isAuthenticated()
            ])
        );

        return $this->response;
    }

    public function store()
    {
        $task = new Task($this->getTaskFieldsFromRequest());

        if ($this->validate($task)) {
            $task->save();
            $_SESSION["task_saved"] = 1;
            return $this->redirect('/');
        }

        return $this->response;
    }

    private function getTaskFieldsFromRequest(): array
    {
        return [
            'user_name' => trim($this->getPostParam('user_name')),
            'email' => trim($this->getPostParam('email')),
            'content' => trim($this->getPostParam('content'))
        ];
    }

    private function validate(Task $task): bool
    {
        $userNameFailed = $task->user_name === '';
        $emailFailed = !filter_var($task->email, FILTER_VALIDATE_EMAIL);
        $contentFailed = $task->content === '';

        $failed = $userNameFailed || $emailFailed || $contentFailed;

        if ($failed) {
            $isAuthenticated = $this->isAuthenticated();
            $this->response->getBody()->write(
                $this->renderer->render('task',
                    compact('task', 'userNameFailed', 'emailFailed', 'contentFailed', 'isAuthenticated'))
            );
        }

        return !$failed;
    }

    public function edit()
    {
        if (!$this->isAuthenticated()) {
            return $this->redirect('/login');
        }

        /** @var Task $task */
        $task = Task::find($this->getQueryParam('id'));
        if ($task) {
            $params = compact('task');
            $params['isAuthenticated'] = $this->isAuthenticated();
            $this->response->getBody()->write(
                $this->renderer->render('task', $params)
            );
            return $this->response;
        } else {
            return $this->response->withStatus(404);
        }
    }

    public function update()
    {
        if (!$this->isAuthenticated()) {
            return $this->redirect('/login');
        }

        /** @var Task $task */
        $task = Task::find($this->getQueryParam('id'));
        if ($task) {
            $task->updated_by_admin = trim($this->getPostParam('content')) !== $task->content;
            $task->fill($this->getTaskFieldsFromRequest());
            if ($this->validate($task)) {
                $task->status = $this->getPostParam('done') ? Task::STATUS_DONE : Task::STATUS_NEW;
                $task->save();
                return $this->redirect('/');
            }
            return $this->response;
        } else {
            return $this->response->withStatus(404);
        }
    }
}
