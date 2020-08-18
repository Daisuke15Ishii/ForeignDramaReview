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
    public function index(Request $request){
        //詳細検索画面を表示するアクション
        $janre = Janre::all();
        return view('search.index', ['janre' => $janre]);
    }

    public function result(Request $request){
        //簡易検索(header)からの検索結果を表示するアクション
        $cond_title = $request->cond_title;
        $janres = Janre::all();

        //タイトルで検索
        if($request->mode == 'modetitle'){
            if ($cond_title != '') {
                // 検索されたら検索結果(部分一致)を取得する(日本語orアルファベット)
                $drama = Drama::where('title', 'LIKE',  "{$cond_title}%")->orWhere('title_en', 'LIKE',  "{$cond_title}%")->orderBy('created_at', 'desc')->orderBy('season', 'asc')->Paginate(5);
                $alldrama =  Drama::where('title', 'LIKE',  "{$cond_title}%")->orWhere('title_en', 'LIKE',  "{$cond_title}%")->get();
            } else {
                // それ以外はすべてのドラマを取得する
                $drama = Drama::orderBy('created_at', 'desc')->orderBy('season', 'asc')->Paginate(5);
                $alldrama =  Drama::all();
            }
            
            //並び替え機能(orderresultアクション)のためにセッション保存
            $request->session()->forget('input');
            $request->session()->put('input', $request->input());
        }elseif($request->mode == 'modecomment'){
            //レビューコメントで検索
            if ($cond_title != '') {
                // 検索されたら検索結果(部分一致)を取得する
                $drama = Drama::whereHas('reviews', function($q) use($cond_title){
                    $q->where('review_comment', 'LIKE',  "%{$cond_title}%");
                })->orderBy('created_at', 'desc');
                $alldrama =  $drama->get();
                $drama = $drama->orderBy('season', 'asc')->Paginate(5);
            } else {
                // それ以外はすべてのドラマを取得する
                $drama = Drama::orderBy('created_at', 'desc')->orderBy('season', 'asc')->Paginate(5);
                $alldrama =  Drama::all();
            }
            //並び替え機能(orderresultアクション)のためにセッション保存
            $request->session()->forget('input');
            $request->session()->put('input', array('cond_title' => '', 'review_comment' => $request->input('cond_title')));
        }

        //並び替え初期値は「新着順」
        $sortby = "create_desc";
        
        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama, 'janre' => $janres, 'cond_title' => $cond_title, 'sortby' => $sortby]);
    }

    public function detailresult(Request $request){
        //詳細条件検索からの検索結果を表示するアクション
        $cond_title = $request->cond_title;
        $janres = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(前方一致)を取得する(日本語orアルファベット)
            $drama = Drama::where('title', 'LIKE',  "{$cond_title}%")->orWhere('title_en', 'LIKE',  "{$cond_title}%");
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
            $drama = $drama->whereHas('janre', function($q) use($j){
                $q->whereIn('janre', $j);
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
        //前作視聴の有無。想定通りの動作しないので保留(恐らくチェックが複数あるとorではなくandで検索されてしまうため)
        if ($request->previous != '') {
            // 検索されたら絞り込み条件に追加
            foreach($request->previous as $previous){
                // チェックがあれば絞り込み条件に追加。
                switch($previous){
                    case "2":
                        //「必須」が一番多い。
                        $drama = $drama->whereHas('score', function($q) use($previous){
                            $q->where('previous_require', '>', 'previous_better')->where('previous_better', '>', 'previous_no');
                        });
                        break;
                    case "1":
                        //「観た方が良い」が一番多い
                        $drama = $drama->whereHas('score', function($q) use($previous){
                            $q->where('previous_better', '>', 'previous_require')->where('previous_better', '>', 'previous_no');
                        });
                        break;
                    case "0":
                        //「不要」が一番多い
                        $drama = $drama->whereHas('score', function($q) use($previous){
                            $q->where('previous_no', '>', 'previous_require')->where('previous_no', '>', 'previous_better');
                        });
                        break;
                }
            }
        }
*/

        //シーズン1のみ検索
        if ($request->season1 == '1') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('season', "1");
        }


        //sortbyの値に応じて並び変え
        if ($request->sortby != '') {
            $sortby = $request->sortby;
            // 検索されたら絞り込み条件に追加
            switch($request['sortby']){
                case "create_desc":
                    //新着順
                    $drama = $drama->orderBy('created_at', 'desc');
                    break;
                case "onair_desc":
                    //投稿更新日が新しい順
                    $drama = $drama->orderBy('onair', 'desc');
                    break;
                case "onair_asc":
                    //投稿更新日が古い順
                    $drama = $drama->orderBy('onair', 'asc');
                    break;
                case "title_asc":
                    //タイトル昇順
                    $drama = $drama->orderBy('title', 'asc');
                    break;
                case "title_asc":
                    //タイトル降順
                    $drama = $drama->orderBy('title', 'desc');
                    break;
                /* innerjoinを利用すると同カラム名が複数存在して、viewにて一部エラーとなるため保留。
                case "total_evaluation_desc":
                    //総合評価が高い順
                    break;
                case "total_evaluation_desc":
                    //総合評価が低い順
                    break;
                */
                case "registers_desc":
                    //マイページ登録数が多い順
                    $drama = $drama->withCount('reviews')->orderBy('reviews_count', 'desc');
                    break;
            }
        }else{
            //初期値は「新着順」
            $drama = $drama->orderBy('created_at', 'desc');
            $sortby = "create_desc";
        }

        //途中でget()するとエラーになるので、最後に一度だけget() or paginate()
        $alldrama = $drama->get();
        $drama = $drama->paginate(5);
        
        //並び替え機能(orderresultアクション)のためにセッション保存
        $request->session()->forget('input');
        $request->session()->put('input', $request->input());

        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama,'janre' => $janres, 'cond_title' => $cond_title, 'sortby' => $sortby]);
    }
    
    public function orderresult(Request $request){
        //検索結果を並び替えするアクション

        if ($request->session()->has('input')) {
          //セッションから値を取得
            $input = $request->session()->get('input');
            $cond_title = $input['cond_title'];
            if(isset($input['cast'])){
                $cast = $input['cast'];
            }else{
                $cast = '';
            }
            if(isset($input['country'])){
                $country = $input['country'];
            }else{
                $country = '';
            }
            if(isset($input['onair1'])){
                $onair1 = $input['onair1'];
            }else{
                $onair1 = '';
            }
            if(isset($input['onair2'])){
                $onair2 = $input['onair2'];
            }else{
                $onair2 = '';
            }
            if(isset($input['janre'])){
                $janre = $input['janre'];
            }else{
                $janre = '';
            }
            if(isset($input['total_evaluation'])){
                $total_evaluation = $input['total_evaluation'];
            }else{
                $total_evaluation = '';
            }
            if(isset($input['story_evaluation'])){
                $story_evaluation = $input['story_evaluation'];
            }else{
                $story_evaluation = '';
            }
            if(isset($input['world_evaluation'])){
                $world_evaluation = $input['world_evaluation'];
            }else{
                $world_evaluation = '';
            }
            if(isset($input['cast_evaluation'])){
                $cast_evaluation = $input['cast_evaluation'];
            }else{
                $cast_evaluation = '';
            }
            if(isset($input['char_evaluation'])){
                $char_evaluation = $input['char_evaluation'];
            }else{
                $char_evaluation = '';
            }
            if(isset($input['visual_evaluation'])){
                $visual_evaluation = $input['visual_evaluation'];
            }else{
                $visual_evaluation = '';
            }
            if(isset($input['music_evaluation'])){
                $music_evaluation = $input['music_evaluation'];
            }else{
                $music_evaluation = '';
            }
            if(isset($input['review_comment'])){
                $review_comment = $input['review_comment'];
            }else{
                $review_comment = '';
            }
            if(isset($input['season1'])){
                $season1 = $input['season1'];
            }else{
                $season1 = '';
            }
        }
        
        $janres = Janre::all();
        if ($cond_title != '') {
            // 検索されたら検索結果(前方一致)を取得する
            $drama = Drama::where('title', 'LIKE',  "{$cond_title}%");
        } else {
            // それ以外はすべてのドラマを取得する。
            $drama = Drama::where('title', 'LIKE',  "%");
        }

        //出演者(本来は「janre」のように、出演者テーブルを用意した方が好ましい)
        if ($cast != '') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('cast1', 'LIKE',  "%{$cast}%")->orwhere('cast2', 'LIKE',  "%{$cast}%")->orwhere('cast3', 'LIKE',  "%{$cast}%");
        }

        //国
        if ($country != '') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('country', "{$country}");
        }
        
        //放送開始日
        if ($onair1 != '') {
            // 検索されたら絞り込み条件に追加
            switch($onair2){
                case "after":
                    //以降
                    $drama = $drama->where('onair', '>=', "{$onair1}"."-01-01");
                    break;
                case "before":
                    //以前
                    $drama = $drama->where('onair', '<=', "{$onair1}"."-12-31");
                    break;
                case "just":
                    //該当年のみ
                    $drama = $drama->whereYear('onair', "{$onair1}");
                    break;
            }
        }
        
        //ジャンル
        if ($janre != '') {
            // 検索されたら絞り込み条件に追加
            $j = $janre;
            $drama = $drama->whereHas('janre', function($q) use($j){
                $q->whereIn('janre', $j);
            });
        }
        
        //総合評価
        if ($total_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $total = $$total_evaluation;
            //集計値を保存するテーブル(scores)を用意しないと、集計値を元にした検索機能のコードが複雑化してしまう
            $drama = $drama->whereHas('score', function($q) use($total){
                $q->where('average_total_evaluation', '>=', $total);
            });
        }

        //シナリオ評価
        if ($story_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $story = $story_evaluation;
            $drama = $drama->whereHas('score', function($q) use($story){
                $q->where('average_story_evaluation', '>=', $story);
            });
        }
        
        //世界観評価
        if ($world_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $world = $world_evaluation;
            $drama = $drama->whereHas('score', function($q) use($world){
                $q->where('average_world_evaluation', '>=', $world);
            });
        }
        
        //演者
        if ($cast_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $cast = $cast_evaluation;
            $drama = $drama->whereHas('score', function($q) use($cast){
                $q->where('average_cast_evaluation', '>=', $cast);
            });
        }
        
        //キャラ
        if ($char_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $char = $char_evaluation;
            $drama = $drama->whereHas('score', function($q) use($char){
                $q->where('average_char_evaluation', '>=', $char);
            });
        }

        //映像美
        if ($visual_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $visual = $visual_evaluation;
            $drama = $drama->whereHas('score', function($q) use($visual){
                $q->where('average_visual_evaluation', '>=', $visual);
            });
        }

        //音楽
        if ($music_evaluation != '') {
            // 検索されたら絞り込み条件に追加
            $music = $music_evaluation;
            $drama = $drama->whereHas('score', function($q) use($music){
                $q->where('average_music_evaluation', '>=', $music);
            });
        }

        //キーワード検索
        if ($review_comment != '') {
            // 検索されたら絞り込み条件に追加
            $comment = $review_comment;
            $drama = $drama->whereHas('reviews', function($q) use($comment){
                $q->where('review_comment', 'LIKE',  "%{$comment}%");
            });
        }

        //シーズン1のみ検索
        if ($season1 == '1') {
            // 検索されたら絞り込み条件に追加
            $drama = $drama->where('season', "1");
        }


        //sortbyの値に応じて並び変え
        if ($request->sortby != '') {
            $sortby = $request->sortby;
            // 検索されたら絞り込み条件に追加
            switch($request['sortby']){
                case "create_desc":
                    //新着順
                    $drama = $drama->orderBy('created_at', 'desc');
                    break;
                case "onair_desc":
                    //投稿更新日が新しい順
                    $drama = $drama->orderBy('onair', 'desc');
                    break;
                case "onair_asc":
                    //投稿更新日が古い順
                    $drama = $drama->orderBy('onair', 'asc');
                    break;
                case "title_asc":
                    //タイトル昇順
                    $drama = $drama->orderBy('title', 'asc');
                    break;
                case "title_asc":
                    //タイトル降順
                    $drama = $drama->orderBy('title', 'desc');
                    break;
                /* innerjoinを利用すると同カラム名が複数存在して、viewにて一部エラーとなるため保留。
                case "total_evaluation_desc":
                    //総合評価が高い順
                    break;
                case "total_evaluation_desc":
                    //総合評価が低い順
                    break;
                */
                case "registers_desc":
                    //マイページ登録数が多い順
                    $drama = $drama->withCount('reviews')->orderBy('reviews_count', 'desc');
                    break;
            }
        }else{
            //初期値は「新着順」
            $drama = $drama->orderBy('created_at', 'desc');
            $sortby = "create_desc";
        }

        //途中でget()するとエラーになるので、最後に一度だけget() or paginate()
        $alldrama = $drama->get();
        $drama = $drama->orderBy('season', 'asc')->paginate(5);

        return view('search.result.index', ['dramas' => $drama, 'alldrama' => $alldrama,'janre' => $janres, 'cond_title' => $cond_title, 'sortby' => $sortby]);
    }
    
}
