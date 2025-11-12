<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 登録フォームを表示
    public function create()
    {
        // resources/views/auth/register.blade.php を表示するように変更
        return view('auth.register');
    }

    // 登録処理
    public function store(RegisterRequest $request)
    {
        // バリデーションは RegisterRequest 経由で実施（OK）

        User::create([
            'name' => $request->name, // ← 名前を追加
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ログイン画面にリダイレクト
        return redirect()->route('login')->with('success', 'アカウントを作成しました！');
    }
}

