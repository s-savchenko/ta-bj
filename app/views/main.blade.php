@extends('layouts.app')

@section('content')
    <div class="text-right mt-2">
        <a href="#" class="text-muted">Вход для администратора</a>
    </div>
    <h1 class="my-5 text-center">Список задач</h1>
    <div class="row my-4">
        <div class="col">
            <a href="#" class="btn btn-primary">Добавить задачу</a>
        </div>
        <div class="col text-right">
            Сортировать по: <a href="#">Имени пользователя</a> | <a href="#">Email</a> | <a href="#">Статусу</a>
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
    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
@endsection
