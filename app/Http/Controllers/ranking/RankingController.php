<?php

namespace App\Http\Controllers\ranking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Score;
use App\Janre;

class RankingController extends Controller
{
    public function index(Request $request){
        //おすすめドラマ(総合評価ランキング)を表示するアクション
        $janres = Janre::all();
        
        //ランキング50位以内、もしくは総合評価85点以上の作品
        $scores = Score::where('rank_average_total_evaluation', '<=',  50)->orwhere('average_total_evaluation', '>=', 85)->orderBy('rank_average_total_evaluation', 'asc');
        $allscores =  $scores->get();
        $scores = $scores->Paginate(10);

        return view('ranking.index', ['scores' => $scores]);
    }
}
