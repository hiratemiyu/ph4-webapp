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
        $today_sum = DB::table('hours')->where('date', $today)->sum('hours');

        // 現在の月の表示
        $this_month = Carbon::now()->format('Y年n月');

        // 今月の学習時間を合計
        $month_sum = DB::table('hours')
                    ->whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->sum('hours');

        // 全ての学習時間を合計
        $total_sum = DB::table('hours')->sum('hours');

        // 時間
        $hoursData = DB::table('hours')->pluck('hours')->toArray();

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
}



