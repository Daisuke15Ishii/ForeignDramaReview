<?php

namespace App\Http\Controllers\drama\dramaID\review\reviewID;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use Auth;

class DramaIDReviewReviewIDController extends Controller
{
    public function add(Request $request){
        //画面表示確認のため仮設定
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.review.create', ['drama' => $drama]);
    }
    
    public function create(Request $request){
        //画面表示確認のため仮設定
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.index', ['drama' => $drama]);
    }
    
    public function index(Request $request){
        //メモ
        return redirect('admin/news');
    }
    
    public function edit(Request $request){
        //メモ
        $review = Review::find($request->review_id);
        if(empty($review)){
            abort(404);
        }
        $drama = Drama::where('id', $review->drama()->first()->id)->first();
        return view('drama.dramaID.review.reviewID.edit',  ['drama' => $drama, 'review' => $review]);
    }
    
    public function update(Request $request){
        //メモ
        return redirect('admin/news');
    }
    
    public function delete(Request $request){
        //メモ
        return redirect('admin/news');
    }
}
