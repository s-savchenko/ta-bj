@extends('layouts.app')

@section('content')
    <div class="text-right mt-2">
        <a href="#" class="text-muted">Вход для администратора</a>
    </div>
    <h1 class="my-5 text-center">Добавить задачу</h1>
    <form class="mb-4" method="post">
        <div class="form-group">
            <label for="nameInput">Имя пользователя</label>
            <input type="text" class="form-control @if(isset($userNameFailed) && $userNameFailed) is-invalid @endif"
                   id="nameInput" placeholder="Имя пользователя" name="user_name"
                   value="{{ isset($userName) ? $userName : '' }}">
            @if (isset($userNameFailed) && $userNameFailed)
                <div class="text-danger"><small>Поле "Имя пользователя" обязательно для заполнения!</small></div>
            @endif
        </div>
        <div class="form-group">
            <label for="emailInput">Email</label>
            <input type="text" class="form-control @if(isset($emailFailed) && $emailFailed) is-invalid @endif"
                   id="emailInput" placeholder="Email" name="email"
                   value="{{ isset($email) ? $email : '' }}">
            @if (isset($emailFailed) && $emailFailed)
                <div class="text-danger">
                    <small>Поле "Email" обязательно для заполнения и должно иметь формат xxx@xxx.xx!</small>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="contentTextarea">Текст задачи</label>
            <textarea class="form-control @if(isset($contentFailed) && $contentFailed) is-invalid @endif"
                      id="contentTextarea" rows="3" name="content">{{ isset($content) ? $content : '' }}</textarea>
            @if (isset($contentFailed) && $contentFailed)
                <div class="text-danger"><small>Поле "Текст задачи" обязательно для заполнения!</small></div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <a href="#" class="text-muted">⇦ К списку задач</a>
@endsection
