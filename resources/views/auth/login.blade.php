@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-box">
        <h1 class="login-title">PiGLy</h1>
        <h2 class="login-subtitle">ログイン</h2>

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力" required autofocus>
                {{-- メールアドレスのエラーメッセージ --}}
            @if ($errors->has('email'))
        <p style="color: red; font-size: 14px;">{{ $errors->first('email') }}</p>
            @endif

            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" placeholder="パスワードを入力" required>
                {{-- パスワードのエラーメッセージ --}}
            @if ($errors->has('password'))
                <p style="color: red; font-size: 14px;">{{ $errors->first('password') }}</p>
            @endif
            </div>

            <button type="submit" class="login-btn">ログイン</button>
        </form>

        <div class="register-link">
            <a href="{{ route('register') }}">アカウント作成はこちら</a>
        </div>
    </div>
</div>
@endsection

<style>
body {
    background: linear-gradient(to bottom right, #fddde6, #e2c3ff);
    font-family: 'Noto Sans JP', sans-serif;
}

.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    background-color: #fff;
    padding: 40px;
    border-radius: 20px;
    width: 350px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.login-title {
    font-size: 40px;
    color: #cc8de0;
    margin-bottom: 10px;
}

.login-subtitle {
    font-size: 18px;
    margin-bottom: 25px;
    color: #333;
}

.form-group {
    text-align: left;
    margin-bottom: 20px;
}

input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    box-sizing: border-box;
}

.login-btn {
    background: linear-gradient(to right, #b292ff, #fca8d3);
    border: none;
    color: white;
    padding: 10px 0;
    width: 100%;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
}

.login-btn:hover {
    opacity: 0.9;
}

.register-link {
    margin-top: 15px;
}

.register-link a {
    color: #6ea8fe;
    text-decoration: none;
    font-size: 14px;
}

.register-link a:hover {
    text-decoration: underline;
}
</style>

