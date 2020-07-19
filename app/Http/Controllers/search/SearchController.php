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
            $drama = Drama::where('title', 'LIKE',  "%{$cond_title}%")->get();
        } else {
            // それ以外はすべてのドラマを取得する
            $drama = Drama::simplePaginate(10);
        }
        return view('search.result.index', ['drama' => $drama, 'janre' => $janre, 'cond_title' => $cond_title]);
    }

    public function detailresult(Request $request){
        $cond_title = $request->cond_title;
        $janre = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(部分一致)を取得する
            $drama = Drama::where('title', 'LIKE',  "%{$cond_title}%");
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
        
        //ジャンル。作成中
        if ($request->janre != '') {
            // 検索されたら絞り込み条件に追加。checkboxから値を複数取得する方法を調べる
//            $j = $request->janre;
            $drama = $drama->whereHas('janre', function($q){
                $q->where('janre', $request->janre);
//            $drama = $drama->join('janres', 'id' function($q){
            });
        }
        
        //総合評価。保留
        if ($request->total_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            
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
        $drama = $drama->get();

        
        return view('search.result.index', ['drama' => $drama, 'janre' => $janre, 'cond_title' => $cond_title]);
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
