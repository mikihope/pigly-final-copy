@extends('layouts.app')

@section('content')
<div class="register-container">
  <div class="register-card">

    {{-- タイトル --}}
    <h1 class="register-title">PiGLy</h1>
    <p>新規会員登録</p>
    <p style="color: gray;">STEP2 体重データの入力</p>


    {{-- フォーム --}}
    <form method="POST" action="{{ route('weights.store') }}">
      @csrf

      {{-- 現在の体重 --}}
<div class="mb-3 text-start">
  <label for="current_weight" class="form-label">現在の体重</label>
  <input type="number" id="current_weight" name="current_weight" step="0.1"
         value="{{ old('current_weight') }}"
         class="form-control @error('current_weight') is-invalid @enderror">
  <span>kg</span>
  @error('current_weight')
    <p style="color:red;">{{ $message }}</p>
  @enderror
</div>

{{-- 目標の体重 --}}
<div class="mb-3 text-start">
  <label for="target_weight" class="form-label">目標の体重</label>
  <input type="number" id="target_weight" name="target_weight" step="0.1"
         value="{{ old('target_weight') }}"
         class="form-control @error('target_weight') is-invalid @enderror">
  <span>kg</span>
  @error('target_weight')
    <p style="color:red;">{{ $message }}</p>
  @enderror
</div>


      <button type="submit" class="btn btn-primary w-100">アカウント作成</button>
    </form>
  </div>
</div>

<style>
/* 背景全体のグラデーション */
body {
  background: linear-gradient(135deg, #fbd3e9, #e6e6fa);
  font-family: "Noto Sans JP", sans-serif;
  min-height: 100vh;
  margin: 0;
}

/* 白カードを中央に配置 */
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

/* 白カード本体 */
.register-card {
  background: #fff;
  border-radius: 25px;
  padding: 50px 70px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  text-align: center;
  width: 100%;
  max-width: 480px;
}

/* タイトル（PiGLy） */
.register-title {
  color: #eb6ea0;
  font-size: 2.5rem;
  font-family: 'Playfair Display', 'Noto Sans JP', serif;
  letter-spacing: 2px;
  margin-bottom: 1rem;
}

/* サブタイトル */
.register-subtitle {
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}
.register-step {
  color: gray;
  font-size: 0.9rem;
  margin-bottom: 30px;
}

/* 各ラベルを左寄せに */
.text-start {
  text-align: left;
}

/* 入力欄デザイン */
input.form-control {
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 10px;
  width: calc(100% - 40px);
  margin-bottom: 5px;
}

/* エラーメッセージ */
p[style*="color:red"], .error-text {
  color: #ff4d4d !important;
  font-size: 14px;
  margin: 3px 0 10px;
  text-align: left;
}

/* ボタン */
.btn-primary {
  background: linear-gradient(135deg, #fbd3e9, #e6e6fa);
  border: none;
  border-radius: 10px;
  color: #fff;
  padding: 10px 0;
  width: 100%;
  font-size: 15px;
  font-weight: bold;
  margin-top: 20px; /* ← これで余白追加 */
}

/* kg 表示の位置微調整 */
span {
  margin-left: 5px;
  color: #555;
}
</style>
@endsection

