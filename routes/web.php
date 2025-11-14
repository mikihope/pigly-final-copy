<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TargetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// -------------------------------------------
// ① ログイン後は /weights へリダイレクト
// -------------------------------------------
Route::get('/dashboard', function () {
    return redirect('/weights');
})->middleware('auth');

// -------------------------------------------
// ② 体重一覧（ログイン必須）
// -------------------------------------------
Route::get('/weights', [WeightController::class, 'index'])
    ->name('weights.index')
    ->middleware('auth');

// -------------------------------------------
// ③ 体重編集（鉛筆/情報更新画面）
// -------------------------------------------
Route::get('/weights/{id}/edit', [WeightController::class, 'edit'])
    ->name('weights.edit')
    ->middleware('auth');

Route::put('/weights/{id}', [WeightController::class, 'update'])
    ->name('weights.update')
    ->middleware('auth');

// ★ ここ！削除ルート（正しい場所・正しい書き方）
Route::delete('/weights/{id}', [App\Http\Controllers\WeightController::class, 'destroy'])
    ->name('weights.destroy')
    ->middleware('auth');

// -------------------------------------------
// ④ 初期体重登録
// -------------------------------------------
Route::get('/weights/create', [WeightController::class, 'create'])
    ->name('weights.create')
    ->middleware('auth');

Route::post('/weights/store', [WeightController::class, 'store'])
    ->name('weights.store')
    ->middleware('auth');

// -------------------------------------------
// ⑤ 目標体重（targets）のルート
// -------------------------------------------
Route::get('/targets/edit', [TargetController::class, 'edit'])
    ->name('targets.edit')
    ->middleware('auth');

Route::put('/targets/update', [TargetController::class, 'update'])
    ->name('targets.update')
    ->middleware('auth');

// -------------------------------------------
// ⑥ 新規登録
// -------------------------------------------
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store']);

// -------------------------------------------
// ⑦ トップページ（ログイン画面へ）
// -------------------------------------------
Route::get('/', function () {
    return redirect('/login');
});

