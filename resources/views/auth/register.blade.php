@extends('layouts.app')

@section('content')
<div class="register-container">
  <div class="register-card">
    <h1 class="register-title">PiGLy </h1>
    <p class="register-subtitle">新規会員登録</p>
    <p class="register-step">STEP1 アカウント情報の登録</p>

<style>
.register-title {
  font-family: 'Playfair Display', serif;
  color: #eb6ea0;
  font-size: 3rem;
  font-weight: 600;
  letter-spacing: 1px;
  margin-bottom: 1.5rem;
}

.register-subtitle {
  font-family: 'Noto Sans JP', sans-serif;
  font-size: 1.1rem;
  color: #444;
  margin-bottom: 0.2rem;
}

.register-step {
  font-family: 'Noto Sans JP', sans-serif;
  font-size: 0.9rem;
  color: #888;
  margin-bottom: 1.5rem;
}

/* 入力欄（全幅＆ラベルと段差をつける） */
.register-card label {
  display: block;
  font-weight: bold;
  margin-bottom: 6px;
  color: #333;
  text-align: left;
}

.register-card input[type="text"],
.register-card input[type="email"],
.register-card input[type="password"] {
  width: 100%; /* ← ボタンと同じ幅 */
  box-sizing: border-box;
  padding: 10px 12px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 14px;
  margin-bottom: 18px; /* ← ラベルとの段差 */
}

/* ボタンと揃えるため、全体の横幅統一 */
.btn-primary {
  display: block;
  width: 100%;
  box-sizing: border-box;
  margin-top: 10px;
}

/* 🔔 エラーポップアップ */
.error-popup {
  position: fixed;
  top: 30px;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(255, 230, 230, 0.95);
  border: 1px solid #f5a5a5;
  color: #b30000;
  font-size: 14px;
  border-radius: 10px;
  padding: 15px 25px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  z-index: 1000;
  animation: fadeInDown 0.4s ease;
}

.error-popup ul {
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
}

@keyframes fadeInDown {
  from { opacity: 0; transform: translate(-50%, -20px); }
  to { opacity: 1; transform: translate(-50%, 0); }
}

</style>

    {{-- バリデーションエラー --}}
    @if ($errors->any())
      <div class="error-popup" id="errorPopup">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      {{-- 名前 --}}
      <div class="form-group">
        <label for="name">お名前</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name')
          <p class="error-text">{{ $message }}</p>
        @enderror
      </div>

      {{-- メールアドレス --}}
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
          <p class="error-text">{{ $message }}</p>
        @enderror
      </div>

      {{-- パスワード --}}
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password">
        @error('password')
          <p class="error-text">{{ $message }}</p>
        @enderror
      </div>

      {{-- ボタン --}}
      <button type="submit" class="btn-primary">次に進む</button>
    </form>

    <div class="link-area">
      <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
  </div>
</div>

<style>
/* 背景グラデーション */
body {
  background: linear-gradient(135deg, #fbd3e9, #e6e6fa);
  font-family: "Noto Sans JP", sans-serif;
}

/* フォームを左寄せ（カード内の中央寄せより優先） */
.register-card form,
.register-card .form-group,
.register-card label {
  text-align: left !important;
}

/* 見やすさの微調整（任意） */
.register-card .form-group { margin-bottom: 12px; }

/* 白カード中央寄せ */
.register-container { display: flex; justify-content: center; align-items: center; min-height: 100vh; }
.register-card {
  background: #fff;
  border-radius: 25px;
  padding: 50px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  text-align: center;
  width: 100%;
  max-width: 450px;
}

/* タイトル */
.register-title { color: #eb6ea0; font-size: 1.5rem; margin-bottom: 1.5rem; }

/* エラーメッセージ */
.error-text, .error-messages li { color: red; font-size: 13px; margin-top: 3px; }

/* ボタン */
.btn-primary {
  background: linear-gradient(135deg, #fbd3e9, #e6e6fa);
  border: none;
  border-radius: 10px;
  color: #fff;
  padding: 10px 0;
  width: 100%;
  font-size: 15px;
}
</style>
@endsection

