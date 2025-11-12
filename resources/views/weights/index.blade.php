@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ヘッダー --}}
    <div class="header">
        <h1 class="logo">PiGLy</h1>
        <div class="header-buttons">
            <a href="{{ route('weights.edit')}}" class="btn target-btn">目標体重設定</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout-btn">ログアウト</button>
            </form>
        </div>
    </div>

    {{-- 上部の体重情報エリア --}}
    <div class="summary-card">
        <div class="summary-item">
            <p>目標体重</p>
            <h2>{{ $target }}kg</h2>
        </div>
        <div class="summary-item">
            <p>目標まで</p>
            <h2>{{ $latest - $target }}kg</h2>
        </div>
        <div class="summary-item">
            <p>最新体重</p>
            <h2>{{ $latest }}kg</h2>
        </div>
    </div>

    {{-- 検索フォーム --}}
    <form method="GET" action="{{ route('weights.index') }}" class="search-form">
        <input type="date" name="from" value="{{ request('from') }}">
        <span>〜</span>
        <input type="date" name="to" value="{{ request('to') }}">
        <button type="submit" class="btn search-btn">検索</button>

        @if(request('from') || request('to'))
    <a href="{{ route('weights.index') }}" class="btn reset-btn">リセット</a>
    <p class="search-result">
        {{ request('from') }}〜{{ request('to') }} の検索結果　{{ $weights->count() }}件
    </p>


        @endif
    </form>

    {{-- データ追加ボタン --}}
    <div class="add-btn-area">
        <button class="btn add-btn" id="openModal">データ追加</button>
    </div>

    {{-- 一覧テーブル --}}
    <table class="weight-table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach($weights as $weight)
            <tr class="hover-row">
                <td>{{ $weight->created_at->format('Y/m/d') }}</td>
                <td>{{ $weight->weight }}kg</td>
                <td>{{ $weight->calorie }}cal</td>
                <td>{{ $weight->exercise_time }}</td>
                <td>
                     <a href="{{ route('weights.edit', $weight->id) }}">
                     <img src="{{ asset('images/edit_icon.png') }}" alt="編集" class="edit-icon">
                     </a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

    {{-- ページネーション --}}
    <div class="pagination-area">
        {{ $weights->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- モーダルウィンドウ（登録用） --}}
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <h2>Weight Logを追加</h2>
        <form method="POST" action="{{ route('weights.store') }}">
            @csrf
            <div class="form-group">
                <label>日付 <span class="required">必須</span></label>
                <input type="date" name="date" value="{{ old('date', now()->format('Y-m-d')) }}">
            </div>

            <div class="form-group">
                <label>体重 <span class="required">必須</span></label>
                <input type="number" name="weight" step="0.1" placeholder="50.0"> kg
            </div>

            <div class="form-group">
                <label>摂取カロリー <span class="required">必須</span></label>
                <input type="number" name="calorie" placeholder="1200"> cal
            </div>

            <div class="form-group">
                <label>運動時間 <span class="required">必須</span></label>
                <input type="time" name="exercise_time">
            </div>

            <div class="form-group">
                <label>運動内容</label>
                <textarea name="exercise_content" placeholder="運動内容を追加"></textarea>
            </div>

            <div class="modal-buttons">
                <button type="button" class="btn close-btn" id="closeModal">戻る</button>
                <button type="submit" class="btn save-btn">登録</button>
            </div>
        </form>
    </div>
</div>
<style>
.hover-row:hover {
    background-color: #f5f5f5;
    transition: background-color 0.2s ease;
}
</style>

@endsection

