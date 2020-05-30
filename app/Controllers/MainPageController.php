<?php


namespace App\Controllers;


use App\Models\Task;

class MainPageController extends Controller
{
    public function index()
    {
        $sort = $this->getQueryParam('sort');
        $sortFirstLetter = $sort ? substr($sort, 0, 1) : '';
        $sortDirection = $sortFirstLetter === '-' ? $sortFirstLetter : '';
        $sort = ltrim($sort, '-');
        $sortField = $sort && in_array($sort, ['user_name', 'email', 'status']) ? $sort : 'id';

        $perPage = 3;
        $page = filter_var($this->getQueryParam('page', 1), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $page = $page && $page > 0 ? $page : 1;

        $tasks =
            Task::query()
                ->orderBy($sortField, $sortDirection === '-' ? 'desc' : 'asc')
                ->offset(($page - 1) * $perPage)
                ->limit($perPage)
                ->get();

        $pagesCount = ceil(Task::query()->count() / $perPage);

        $isAuthenticated = $this->isAuthenticated();

        $taskSaved = isset($_SESSION["task_saved"]);
        if ($taskSaved) {
            unset($_SESSION["task_saved"]);
        }

        $this->response->getBody()->write(
            $this->blade->render('main',
                compact('tasks', 'sortDirection', 'sortField', 'pagesCount', 'page', 'isAuthenticated', 'taskSaved'))
        );

        return $this->response;
    }
}
