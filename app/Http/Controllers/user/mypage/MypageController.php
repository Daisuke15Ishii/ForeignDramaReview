<?php

namespace App\Http\Controllers\user\mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MypageController extends Controller
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
        $auth = \Auth::user();
        $dramas = $auth->favoritesDrama()->get(); //マイページ登録されている作品
        $reviews = $auth->reviews()->get(); //レビュー投稿した作品。これはviewに渡す必要ないかも
        return view('user.mypage.index', ['reviews' => $reviews]);
    }

    public function result(Request $request){
        //searchからコピーしただけなので以下不要
        $cond_title = $request->cond_title;
        $janre = Janre::all();

        //タイトルで検索
        if($request->mode == 'modetitle'){
            if ($cond_title != '') {
                // 検索されたら検索結果(部分一致)を取得する
                $drama = Drama::where('title', 'LIKE',  "{$cond_title}%")->Paginate(5);
                $alldrama =  Drama::where('title', 'LIKE',  "{$cond_title}%")->get();
            } else {
                // それ以外はすべてのドラマを取得する
                $drama = Drama::Paginate(5);
                $alldrama =  Drama::all();
            }
        }elseif($request->mode == 'modecomment'){
            //レビューコメントで検索
            if ($cond_title != '') {
                // 検索されたら検索結果(部分一致)を取得する
                $drama = Drama::whereHas('reviews', function($q) use($cond_title){
                    $q->where('review_comment', 'LIKE',  "%{$cond_title}%");
                });
                $alldrama =  $drama->get();
                $drama = $drama->Paginate(5);
            } else {
                // それ以外はすべてのドラマを取得する
                $drama = Drama::Paginate(5);
                $alldrama =  Drama::all();
            }
        }

        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama, 'janre' => $janre, 'cond_title' => $cond_title]);
    }

    public function detailresult(Request $request){
        //searchからコピーしただけなので以下不要
        $cond_title = $request->cond_title;
        $janre = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(前方一致)を取得する
            $drama = Drama::where('title', 'LIKE',  "{$cond_title}%");
        } else {
            // それ以外はすべてのドラマを取得する。
            $drama = Drama::where('title', 'LIKE',  "%");
        }
        

        //出演者(本来は「janre」のように、出演者テーブルを用意した方が好ましい)
        if ($request->cast != '') {
            // 検索されたら絞り込み条件に追加
            $cast = $request->cast;
            $drama = $drama->where('cast1', 'LIKE',  "%{$cast}%")->orwhere('cast2', 'LIKE',  "%{$cast}%")->orwhere('cast3', 'LIKE',  "%{$cast}%");
        }

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
        
        //総合評価
        if ($request->total_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $total = $request->total_evaluation;
            //集計値を保存するテーブル(scores)を用意しないと、集計値を元にした検索機能のコードが複雑化してしまう
            $drama = $drama->whereHas('score', function($q) use($total){
                $q->where('average_total_evaluation', '>=', $total);
            });
        }

        //シナリオ評価
        if ($request->story_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $story = $request->story_evaluation;
            $drama = $drama->whereHas('score', function($q) use($story){
                $q->where('average_story_evaluation', '>=', $story);
            });
        }
        
        //世界観評価
        if ($request->world_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $world = $request->world_evaluation;
            $drama = $drama->whereHas('score', function($q) use($world){
                $q->where('average_world_evaluation', '>=', $world);
            });
        }
        
        //演者
        if ($request->cast_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $cast = $request->cast_evaluation;
            $drama = $drama->whereHas('score', function($q) use($cast){
                $q->where('average_cast_evaluation', '>=', $cast);
            });
        }
        
        //キャラ
        if ($request->char_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $char = $request->char_evaluation;
            $drama = $drama->whereHas('score', function($q) use($char){
                $q->where('average_char_evaluation', '>=', $char);
            });
        }

        //映像美
        if ($request->visual_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $visual = $request->visual_evaluation;
            $drama = $drama->whereHas('score', function($q) use($visual){
                $q->where('average_visual_evaluation', '>=', $visual);
            });
        }

        //音楽
        if ($request->music_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $music = $request->music_evaluation;
            $drama = $drama->whereHas('score', function($q) use($music){
                $q->where('average_music_evaluation', '>=', $music);
            });
        }

        //キーワード検索
        if ($request->review_comment != '') {
            // 検索されたら絞り込み条件に追加
            $comment = $request->review_comment;
            $drama = $drama->whereHas('reviews', function($q) use($comment){
                $q->where('review_comment', 'LIKE',  "%{$comment}%");
            });
        }

/*
        //前作視聴の有無。想定通りの動作しないので保留
        if ($request->previous != '') {
            // 検索されたら絞り込み条件に追加
            $previous = $request->previous;
            $drama = $drama->whereHas('score', function($q) use($previous){
                //想定通りの動作しないので保留。
                if($previous == 2){
                    //「必須」が一番多い。
                    $q->where('previous_require', 'previous_better')->where('previous_better', '>', 'previous_no');
                }elseif($previous == 1){
                    //「観た方が良い」が一番多い
                    $q->where('previous_better', 'previous_require')->where('previous_better', '>', 'previous_no');
                }else{
                    //「不要」が一番多い
                    $q->where('previous_no', 'previous_require')->where('previous_no', '>', 'previous_better');
                }
            });
        }
*/

        //シーズン1のみ検索
        if ($request->season1 == '1') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('season', "1");
        }
        
        //途中でget()するとエラーになるので、最後に一度だけget() or paginate()
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
