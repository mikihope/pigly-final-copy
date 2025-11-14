@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Weight Log</h2>

    {{-- 更新フォーム --}}
    <form action="{{ route('weights.update', $weight->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 日付 --}}
        <div class="mb-3">
            <label class="form-label">日付</label>
            <input type="date" class="form-control" name="date"
                   value="{{ old('date', $weight->date) }}">
            @error('date')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 体重 --}}
        <div class="mb-3">
            <label class="form-label">体重</label>
            <input type="text" class="form-control" name="weight"
                   value="{{ old('weight', $weight->weight) }}">
            @error('weight')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 摂取カロリー --}}
        <div class="mb-3">
            <label class="form-label">摂取カロリー</label>
            <input type="text" class="form-control" name="calorie"
                   value="{{ old('calorie', $weight->calorie) }}">
            @error('calorie')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 運動時間 --}}
        <div class="mb-3">
            <label class="form-label">運動時間</label>
            <input type="time" class="form-control" name="exercise_time"
                   value="{{ old('exercise_time', $weight->exercise_time) }}">
            @error('exercise_time')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- 運動内容 --}}
        <div class="mb-3">
            <label class="form-label">運動内容</label>
            <textarea name="exercise_content" rows="3" class="form-control">{{ old('exercise_content', $weight->exercise_content) }}</textarea>
            @error('exercise_content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- ボタン --}}
        <div class="d-flex gap-3">
            <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>

    {{-- 削除ボタン--}}
    <form action="{{ route('weights.destroy', $weight->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>
    </form>

</div>
@endsection

