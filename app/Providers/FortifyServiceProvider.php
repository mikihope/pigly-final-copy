<?php

namespace App\Providers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // ログイン試行制限：1分間に5回まで
        RateLimiter::for('login', function ($job) {
            return Limit::perMinute(5);
        });

        Fortify::authenticateUsing(function (Request $request) {
    $validator = Validator::make(
        $request->all(),
        (new LoginRequest())->rules(),
        (new LoginRequest())->messages()
    );

    if ($validator->fails()) {
        // ここを重要：バリデーション失敗時に日本語メッセージをセッションへ
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        return $user;
    }

    return null;
});


    }
}

