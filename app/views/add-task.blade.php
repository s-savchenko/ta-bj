@extends('layouts.app')

@section('content')
    <div class="text-right mt-2">
        <a href="#" class="text-muted">Вход для администратора</a>
    </div>
    <h1 class="my-5 text-center">Добавить задачу</h1>
    <form class="mb-4">
        <div class="form-group">
            <label for="nameInput">Имя пользователя</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Имя пользователя">
        </div>
        <div class="form-group">
            <label for="emailInput">Email</label>
            <input type="email" class="form-control" id="emailInput" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="taskTextarea">Текст задачи</label>
            <textarea class="form-control" id="taskTextarea" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <a href="#" class="text-muted">⇦ К списку задач</a>
@endsection
