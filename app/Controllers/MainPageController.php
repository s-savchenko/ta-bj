<?php


namespace App\Controllers;


use App\Models\Task;

class MainPageController extends Controller
{
    public function index()
    {
        $query = $this->request->getQueryParams();
        $sort = isset($query['sort']) && $query['sort'] ? $query['sort'] : false;
        $sortFirstLetter = $sort ? substr($sort, 0, 1) : '';
        $sortDirection = $sortFirstLetter === '-' ? $sortFirstLetter : '';
        $sort = ltrim($sort, '-');
        $sortField = $sort && in_array($sort, ['user_name', 'email', 'status']) ? $sort : 'id';

        $perPage = 3;
        $page = isset($query['page']) ? $query['page'] : 0;
        $page = filter_var($page, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $page = $page && $page > 0 ? $page : 1;

        $tasks =
            Task::query()
                ->orderBy($sortField, $sortDirection === '-' ? 'desc' : 'asc')
                ->offset(($page - 1) * $perPage)
                ->limit($perPage)
                ->get();

        $pagesCount = ceil(Task::query()->count() / $perPage);

        $this->response->getBody()->write(
            $this->blade->render('main', compact('tasks', 'sortDirection', 'sortField', 'pagesCount', 'page'))
        );

        return $this->response;
    }
}
