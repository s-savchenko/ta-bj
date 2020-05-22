<?php


namespace App\Controllers;


use App\Models\Task;

class MainPageController extends Controller
{
    public function index()
    {
        $query = $this->request->getQueryParams();
        $sort = isset($query['sort']) && $query['sort'] ? $query['sort'] : false;
        $sortDirection = $sort && substr($sort, 0, 1) === '-' ? 'desc' : 'asc';
        $sort = ltrim($sort, '-');
        $sortField = $sort && in_array($sort, ['user_name', 'email', 'status']) ? $sort : 'id';

        $tasks =
            Task::query()
                ->orderBy($sortField, $sortDirection)
                ->limit(3)
                ->get();

        $this->response->getBody()->write($this->blade->render('main', compact('tasks', 'sortDirection', 'sortField')));

        return $this->response;
    }
}
