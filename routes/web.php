<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TargetController;

Route::resource('targets',TargetController::class);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Fortifyのログイン後は /dashboard にリダイレクトされるため、
| 存在しないエラーを防ぐ目的で /weights にリダイレクトします。
| また、auth ミドルウェアでログイン済みユーザーのみアクセス可能にします。
|--------------------------------------------------------------------------
*/

// ログイン後のリダイレクト先修正
Route::get('/dashboard', function () {
    return redirect('/weights');
})->middleware('auth');

// ホーム（体重一覧）※ログイン必須
Route::get('/weights', [WeightController::class, 'index'])
    ->name('weights.index')
    ->middleware('auth');


// 目標体重の更新処理（ログイン必須）
Route::put('/weight/target/update', [WeightTargetController::class, 'update'])
    ->name('weights.update')
    ->middleware('auth');

// 初期体重登録画面（STEP2）
Route::get('/weights/create', [App\Http\Controllers\WeightController::class, 'create'])
    ->name('weight_create')
    ->middleware('auth');

// 初期体重登録処理
Route::post('/weights/store', [App\Http\Controllers\WeightController::class, 'store'])
    ->name('weights.store')
    ->middleware('auth');


// トップページ（初回アクセス時はログイン画面へ）
Route::get('/', function () {
    return redirect('/login');
});

// 新規会員登録
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/weights/store', [App\Http\Controllers\WeightController::class, 'store'])
    ->name('weights.store');
