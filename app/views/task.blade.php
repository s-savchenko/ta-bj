@extends('layouts.app')

@section('content')
    <h1 class="my-5 text-center">Добавить задачу</h1>
    <form class="mb-4" method="post">
        <div class="form-group">
            <label for="nameInput">Имя пользователя</label>
            <input type="text" class="form-control @if(isset($userNameFailed) && $userNameFailed) is-invalid @endif"
                   id="nameInput" placeholder="Имя пользователя" name="user_name"
                   value="{{ isset($user_name) ? $user_name : '' }}" required>
            @if (isset($userNameFailed) && $userNameFailed)
                <div class="text-danger"><small>Поле "Имя пользователя" обязательно для заполнения!</small></div>
            @endif
        </div>
        <div class="form-group">
            <label for="emailInput">Email</label>
            <input type="email" class="form-control @if(isset($emailFailed) && $emailFailed) is-invalid @endif"
                   id="emailInput" placeholder="Email" name="email"
                   value="{{ isset($email) ? $email : '' }}" required>
            @if (isset($emailFailed) && $emailFailed)
                <div class="text-danger">
                    <small>Поле "Email" обязательно для заполнения и должно иметь формат xxx@xxx.xx!</small>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="contentTextarea">Текст задачи</label>
            <textarea class="form-control @if(isset($contentFailed) && $contentFailed) is-invalid @endif"
                      id="contentTextarea" rows="3" name="content" required>{{ isset($content) ? $content : '' }}</textarea>
            @if (isset($contentFailed) && $contentFailed)
                <div class="text-danger"><small>Поле "Текст задачи" обязательно для заполнения!</small></div>
            @endif
        </div>
        @if (isset($isAuthenticated) && $isAuthenticated)
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="statusCheck" name="status">
                <label class="form-check-label" for="statusCheck">Задача выполнена</label>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <a href="/" class="text-muted">⇦ К списку задач</a>
@endsection
