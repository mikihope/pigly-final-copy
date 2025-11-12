<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class WeightController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ログイン中ユーザーの体重記録をページネーションで取得（8件ずつ表示）
        $weights = WeightLog::where('user_id', $user->id)->paginate(8);

        // 目標体重を取得
        $target = WeightTarget::where('user_id', $user->id)->value('target_weight');

        // 最新体重を取得（データがない場合はnull）
        $latest = WeightLog::where('user_id', $user->id)
            ->latest('date')
            ->value('weight');

        return view('weights.index', compact('weights', 'target', 'latest'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calorie' => 'required|integer',
            'exercise_time' => 'required',
            'exercise_content' => 'required|string',
        ]);

        $validated['user_id'] = $user->id;

        WeightLog::create($validated);

        return redirect()->route('weights.index');
    }

    public function edit($id)
    {
        $weight = WeightLog::findOrFail($id);
        return view('weights.edit', compact('weight'));
    }

    public function update(Request $request, $id)
    {
        $weight = WeightLog::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calorie' => 'required|integer',
            'exercise_time' => 'required',
            'exercise_content' => 'required|string',
        ]);

        $weight->update($validated);

        return redirect()->route('weights.index');
    }
}

