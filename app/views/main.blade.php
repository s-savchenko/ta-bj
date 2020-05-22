@extends('layouts.app')

@section('content')
    <div class="text-right mt-2 text-muted">
        @if ($isAuthenticated)
            Вы вошли, как администратор. <a href="/logout">Выйти</a>
        @else
            <a href="/login" class="text-muted">Вход для администратора</a>
        @endif
    </div>
    <h1 class="my-5 text-center">Список задач</h1>
    <div class="row my-4">
        <div class="col">
            <a href="/add-task" class="btn btn-primary">Добавить задачу</a>
        </div>
        <div class="col text-right">
            Сортировать по:
            <a href="/?sort={{ $sortField === 'user_name' && $sortDirection === '' ? '-' : '' }}user_name">
                Имени пользователя
            </a>
            | <a href="/?sort={{ $sortField === 'email' && $sortDirection === '' ? '-' : '' }}email">Email</a>
            | <a href="/?sort={{ $sortField === 'status' && $sortDirection === '' ? '-' : '' }}status">Статусу</a>
        </div>
    </div>
    <div>
        @foreach($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-muted">{{ $task->user_name }} (<b>{{ $task->email }}</b>)</p>
                <p>{{ $task->content }}</p>
                <div class="text-success">{{ $task->status }}</div>
            </div>
        </div>
        @endforeach
    </div>

    @if ($pagesCount > 1)
        <nav class="mt-4">
            <ul class="pagination">
                @for($i = 1; $i <= $pagesCount; $i++)
                    <li class="page-item @if($i === $page) active @endif">
                        <a class="page-link"
                           href="?{{ $sortField !== 'id' ? 'sort=' . $sortDirection . '' . $sortField . '&' : '' }}page={{ $i }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor
            </ul>
        </nav>
    @endif
@endsection
