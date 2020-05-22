@extends('layouts.app')

@section('content')
    <h1 class="my-5 text-center">Вход для администратора</h1>
    <form method="post">
        <div class="form-group">
            <label for="userNameInput">Логин</label>
            <input type="text" class="form-control @if(isset($loginFailed) && $loginFailed) is-invalid @endif"
                   id="userName" placeholder="Логин"
                   name="login" value="{{ isset($login) ? $login : '' }}">
            @if (isset($loginFailed) && $loginFailed)
                <div class="invalid-feedback">Поле "Логин" обязательно для заполнения!</div>
            @endif
        </div>
        <div class="form-group">
            <label for="passwordInput">Пароль</label>
            <input type="password" class="form-control @if(isset($passwordFailed) && $passwordFailed) is-invalid @endif"
                   id="passwordInput" placeholder="Пароль"
                   name="password" value="{{ isset($password) ? $password : '' }}">
            @if (isset($passwordFailed) && $passwordFailed)
                <div class="invalid-feedback">Поле "Пароль" обязательно для заполнения!</div>
            @endif
        </div>
        @if (isset($loginFailed) && !$loginFailed && isset($passwordFailed) && !$passwordFailed && isset($success) && !$success)
            <div class="text-danger">Проверьте правильность написания логина и пароля!</div>
        @endif
        <button type="submit" class="btn btn-primary mt-3 text-capitalize">Войти</button>
    </form>
    <p class="mt-5">
        <a href="/">На главную</a>
    </p>
@endsection
