<?php

namespace App\Http\Controllers\drama\dramaID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use App\Janre;
use App\Follow;
use Auth;


class DramaIDController extends Controller
{
    //
    public function index(Request $request,$drama_id){
        //画面表示確認のため仮設定
        $drama = Drama::find($drama_id);
        $reviews = $drama->reviews();

        //sorts(checkbox)によってレビュー表示の条件を絞る
        if ($request->sorts != '') {
            $sorts = $request->sorts;
            foreach($request->sorts as $sort){
                // チェックがあれば絞り込み条件に追加。
                switch($sort){
                    case "watched":
                        //視聴済のみ検索
                        $reviews = $reviews->where('progress', '4');
                        break;
                    case "review_comment":
                        //レビューコメント有のみ検索
                        $reviews = $reviews->whereNotNull('review_comment');
                        break;
                    case "following":
                        //フォローしているユーザーのみ検索
                        if(Auth::check()){
                            $follows = Follow::where('user_id', \Auth::id())->get();
                            $following_id = array();
                            $f = 0;
                            foreach($follows as $follow){
                                $following_id[$f] = $follow->following_user_id;
                                $f++;
                            }
                            $reviews = $reviews->whereIn('user_id', $following_id);
                            break;
                        }
                }
            }
        }else{
            //全て未チェック(requestにsortsなし)時の「in_array」エラー回避のため記述
            $sorts = array(-1);
        }

        //sortbyの値に応じてレビューを並び変え
        if ($request->sortby != '') {
            $sortby = $request->sortby;
            // 検索されたら絞り込み条件に追加
            switch($request['sortby']){
                case "update_desc":
                    //投稿更新日が新しい順
                    $reviews = $reviews->orderBy('updated_at', 'desc');
                    break;
                case "update_asc":
                    //投稿更新日が古い順
                    $reviews = $reviews->orderBy('updated_at', 'asc');
                    break;
                case "total_evaluation_desc":
                    //総合評価が高い順
                    $reviews = $reviews->orderBy('total_evaluation', 'desc');
                    break;
                case "total_evaluation_desc":
                    //総合評価が低い順
                    $reviews = $reviews->orderBy('total_evaluation', 'asc');
                    break;
                case "like_desc":
                    //いいねが多い順
                    $reviews = $reviews->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
                case "like_asc":
                    //いいねが少ない順
                    $reviews = $reviews->withCount('likes')->orderBy('likes_count', 'desc');
                    break;
            }
        }else{
            $reviews = $reviews->orderBy('updated_at', 'desc');
            $sortby = -1;
        }
        
        $allreviews = $reviews->count();
        $reviews = $reviews->Paginate(5);
        
        return view('drama.dramaID.index', ['drama' => $drama, 'reviews' => $reviews, 'allreviews' => $allreviews, 'sorts' => $sorts, 'sortby' => $sortby]);
    }
}
