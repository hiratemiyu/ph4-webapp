<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Hours;
use App\Models\Content;

class WebappController extends Controller
{
    public function index()
    {
        // 今日の日付と現在の月を取得
        $today = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('Y-m');

        // 今日の学習時間を合計
        $today_sum = DB::table('hours')->where('date', $today)->sum('hours')?? 0;

        // 現在の月の表示
        $this_month = Carbon::now()->format('Y年n月');

        // 今月の学習時間を合計
        $month_sum = DB::table('hours')
                    ->whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->sum('hours')?? 0;

        // 全ての学習時間を合計
        $total_sum = DB::table('hours')->sum('hours')?? 0;

        // 時間
        $hoursData = DB::table('hours')->pluck('hours')->toArray()?? [0];

        // 学習言語の時間を合計
        $data = Language::join('hours', 'languages.id', '=', 'hours.id')
        ->select('language', DB::raw('SUM(hours.hours) as total_hours'))
        ->groupBy('language')
        ->get();

        // ラベルとデータを分割
        $labels = $data->pluck('language')->toArray();
        $hours = $data->pluck('total_hours')->toArray();

        // コンテンツごとの時間を合計
        $content_data = Content::join('hours', 'contents.id', '=', 'hours.id')
        ->select('content', DB::raw('SUM(hours.hours) as total_hours'))
        ->groupBy('content')
        ->get();

        // ラベルとデータを分割
        $content_labels = $content_data->pluck('content')->toArray();
        $content_hours = $content_data->pluck('total_hours')->toArray();

        // ビューに変数を渡す
        return view('webapp', [
            'today_sum' => $today_sum,
            'this_month' => $this_month,
            'month_sum' => $month_sum,
            'total_sum' => $total_sum,
            'hoursData' => $hoursData,
            'labels' => $labels,
            'hours' => $hours,
            'content_labels' => $content_labels,
            'content_hours' => $content_hours,
        ]);
    }

    public function store(Request $request)
    {
        // データの検証
        $validated = $request->validate([
            'name' => 'required|date', // 学習日
            'learningContent' => 'required|array', // 学習コンテンツ
            'learningLanguage' => 'required|array', // 学習言語
            'price' => 'required|numeric', // 学習時間
        ]);
    
        // 学習時間の計算
        $totalTime = $validated['price'];
        $contentCount = count($validated['learningContent']);
        $languageCount = count($validated['learningLanguage']);
        $timePerContent = $totalTime / max($contentCount, $languageCount); // より多い選択肢の数で等分
    
        // ここにデータベースへの保存ロジックを追加
    
        // 保存後のリダイレクトやビューの返却
        return redirect()->route('webapp.index')->with('success', '学習記録が保存されました。');
    }

}



