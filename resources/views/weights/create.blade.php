@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">体重を追加</h2>

    <form action="{{ route('weights.store') }}" method="POST">
        @csrf

        {{-- 日付 --}}
        <div class="mb-3">
            <label class="form-label">日付</label>
            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
            @error('date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 体重 --}}
        <div class="mb-3">
            <label class="form-label">体重</label>
            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
            @error('weight')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 摂取カロリー --}}
        <div class="mb-3">
            <label class="form-label">摂取カロリー</label>
            <input type="text" class="form-control" name="calorie" value="{{ old('calorie') }}">
            @error('calorie')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 運動時間 --}}
        <div class="mb-3">
            <label class="form-label">運動時間</label>
            <input type="time" class="form-control" name="exercise_time" value="{{ old('exercise_time') }}">
            @error('exercise_time')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 運動内容 --}}
        <div class="mb-3">
            <label class="form-label">運動内容</label>
            <textarea class="form-control" rows="3" name="exercise_content">{{ old('exercise_content') }}</textarea>
            @error('exercise_content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex gap-3">
            <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>
@endsection

