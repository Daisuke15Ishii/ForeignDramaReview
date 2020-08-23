<?php

namespace App\Http\Controllers\drama\review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Review;
use Carbon\Carbon;

class DramaReviewController extends Controller
{
    public function index(Request $request){
        //「最新レビュー一覧」を表示するアクション
        $reviews = Review::whereDate('updated_at', '>=', Carbon::now()->subMonth(6)); //半年前のレビューまで取得
        $reviews = $reviews->whereNotNull('total_evaluation'); //総合評価済のみ
        
        //sorts(checkbox)によってレビュー表示の条件を絞る
        if ($request->sorts != '') {
            $sorts = $request->sorts;
            foreach($request->sorts as $sort){
                // チェックがあれば絞り込み条件に追加。
                switch($sort){
                    case "review_comment":
                        //レビューコメント有のみ検索
                        $reviews = $reviews->whereNotNull('review_comment');
                        break;
                    //フォロー中のみ(ログイン時)も今後作成予定
                }
            }
        }else{
            //全て未チェック(requestにsortsなし)時の「in_array」エラー回避のため記述
            $sorts = array(-1);
        }

        //更新順に並び変え
        $reviews = $reviews->orderby('updated_at', 'desc');

        $allreviews = $reviews->count();
        $reviews = $reviews->Paginate(20);
        
        return view('drama.review.index', ['reviews' => $reviews, 'allreviews' => $allreviews, 'sorts' => $sorts]);
    }
}
