<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Score;
use App\Review;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(Request $request){
        //トップページを表示するアクション
        
        //おすすめドラマ(総合評価ランキング)の表示関連↓
        //ランキング50位以内、もしくは総合評価85点以上の作品
        $scores = Score::where('rank_average_total_evaluation', '<=',  50)->orwhere('average_total_evaluation', '>=', 85)->orderBy('rank_average_total_evaluation', 'asc');
        $scores = $scores->Paginate(3);
        //おすすめドラマ(総合評価ランキング)の表示関連↑


        //「最新レビュー一覧」表示関連↓
        $reviews = Review::whereDate('updated_at', '>=', Carbon::now()->subMonth(6)); //半年前のレビューまで取得
        $reviews = $reviews->whereNotNull('total_evaluation'); //総合評価済のみ

        //更新順に並び変え
        $reviews = $reviews->orderby('updated_at', 'desc');

        $reviews = $reviews->Paginate(6);
        //「最新レビュー一覧」表示関連↑

        return view('index', ['scores' => $scores,'reviews' => $reviews]);
    }
}
