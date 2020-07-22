<?php

namespace App\Http\Controllers\search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use Auth;
use App\Janre;

class SearchController extends Controller
{
    //
    public function add(){
        //メモ
        return view('admin.news.create');
    }
    
    public function create(Request $request){
        //メモ
        return redirect('admin/news/create');
    }

    public function index(Request $request){
        //メモ
        $janre = Janre::all();
        return view('search.index', ['janre' => $janre]);
    }

    public function result(Request $request){
        $cond_title = $request->cond_title;
        $janre = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(部分一致)を取得する
            $drama = Drama::where('title', 'LIKE',  "{$cond_title}%")->Paginate(5);
            $alldrama =  Drama::where('title', 'LIKE',  "{$cond_title}%")->get();
        } else {
            // それ以外はすべてのドラマを取得する
            $drama = Drama::Paginate(5);
            $alldrama =  Drama::all();
        }
        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama, 'janre' => $janre, 'cond_title' => $cond_title]);
    }

    public function detailresult(Request $request){
        $cond_title = $request->cond_title;
        $janre = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(前方一致)を取得する
            $drama = Drama::where('title', 'LIKE',  "{$cond_title}%");
        } else {
            // それ以外はすべてのドラマを取得する。paginateは最後にした方が良さそう。collectionに対してwherehasメソッドはないとのエラー
//            $drama = Drama::simplePaginate(10);
//            $drama = Drama::all();
            $drama = Drama::where('title', 'LIKE',  "%");
        }
        
        //ここから下は@resultと異なる
        //$request->cast1は保留
        //国
        if ($request->country != '') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('country', "{$request->country}");
        }
        //放送開始日
        if ($request->onair1 != '') {
            // 検索されたら絞り込み条件に追加
            switch($request['onair2']){
                case "after":
                    //以降
                    $drama = $drama->where('onair', '>=', "{$request->onair1}"."-01-01");
                    break;
                case "before":
                    //以前
                    $drama = $drama->where('onair', '<=', "{$request->onair1}"."-12-31");
                    break;
                case "just":
                    //該当年のみ
                    $drama = $drama->whereYear('onair', "{$request->onair1}");
                    break;
            }
        }
        
        //ジャンル
        if ($request->janre != '') {
            // 検索されたら絞り込み条件に追加
            $j = $request->janre;
            //「janre」はdramaモデルで定義したjanreメソッド。「use」はwhereHas内に変数を渡すために必要。$jは配列なのでforeachした方が良い？
            $drama = $drama->whereHas('janre', function($q) use($j){
                $q->where('janre', $j);
            });
        }
        
        //総合評価。保留
        if ($request->total_evaluation != '') {
            // 検索されたら絞り込み条件に追加
//            $avg_total = $drama->reviews()->selectraw('drama_id, avg(total_evaluation) as avg_total')->groupby('drama_id')->get();

            $total = $request->total_evaluation;
            //joinしてselectrawでavg_total作成後、inputのtotalでwhereする、そのdrama_idを本来のデータベースでwhereする
        $drama = $drama->whereHas('score', function($q) use($total){
                $q->where('average_total_evaluation', '>=', $total);
        });
/*
            $join_dramas_reveiws = $drama->join('reviews', 'dramas.id', '=', 'reviews.drama_id');
            $join_dramas_reveiws =$join_dramas_reveiws->select('id')->groupBy('id')->havingRaw('avg(total_evaluation) > ?', [50]);
            $join_dramas_reveiws =$join_dramas_reveiws->where('avg_total', '>=', $total);
            $drama = $drama->where('id', $join_dramas_reveiws->get()->id);
*/
//            $drama = $drama->where('total_evaluation', '>=', "{$request->total_evaluation}");
        }


        //キーワード検索。保留
        if ($request->review_comment != '') {
            // 検索されたら絞り込み条件に追加
            
//            $drama = $drama->where('total_evaluation', '>=', "{$request->total_evaluation}");
        }

        //前作視聴の有無。保留
        if ($request->previous != '') {
            // 検索されたら絞り込み条件に追加
            
//            $drama = $drama->where('total_evaluation', '>=', "{$request->total_evaluation}");
        }

        //シーズン1のみ検索
        if ($request->season1 == '1') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('season', "1");
        }
        
        //途中でget()するとエラーになるので、最後に一度だけget() or paginate(10)
        $alldrama = $drama->get();
        $drama = $drama->paginate(5);

        
        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama,'janre' => $janre, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request){
        //メモ
        return view('admin.news.edit',  ['news_form' => $news]);
    }
    
    public function update(Request $request){
        //メモ
        return redirect('admin/news');
    }
    
    public function delete(Request $request){
        //メモ
        return redirect('admin/news/');
    }
    
    
}
