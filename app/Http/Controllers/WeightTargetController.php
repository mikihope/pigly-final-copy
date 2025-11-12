<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;

class WeightTargetController extends Controller
{
    // 目標体重編集画面の表示
    public function edit()
    {
        // 現在ログイン中のユーザーの目標体重を取得
        $target = WeightTarget::where('user_id', auth()->id())->first();

        return view('weights.edit', compact('target'));
    }

    // 目標体重の更新処理
    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:1|max:999',
        ]);

        $weightTarget = WeightTarget::where('user_id', auth()->id())->first();
        $weightTarget->update([
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('weights.index')->with('success', '目標体重を更新しました！');
    }
}
