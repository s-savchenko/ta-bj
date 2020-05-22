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
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-muted">Сергей Савченко (<b>s.savchenko@outlook.com</b>)</p>
                <p>Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. </p>
                <div class="text-success">Выполнено</div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-muted">Сергей Савченко (<b>s.savchenko@outlook.com</b>)</p>
                <p>Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. </p>
                <div class="text-danger">Не выполнено</div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <p class="text-muted">Сергей Савченко (<b>s.savchenko@outlook.com</b>)</p>
                <p>Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. Длинный текст озадачи идет здесь. </p>
                <div class="text-danger">Не выполнено</div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="mt-4">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
@endsection
