<?php

namespace App\Http\Controllers\drama\dramaID\review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drama;
use App\Review;
use App\User;
use App\Score;
use App\Favorite;
use App\Like;
use Auth;

class DramaIDReviewController extends Controller
{
    public function add(Request $request){
        //画面表示確認のため仮設定
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.review.create', ['drama' => $drama]);
    }
    
    public function create(Request $request){
        //画面表示確認のため仮設定,とりあえず設定を色々終えているdramaID.indexへ飛ばす
        
        $this->validate($request, Review::$rules);
        
        $review = new Review;
        $form = $request->all();
        if(empty($form['review_title'])){
            unset($form['spoiler_alert']);
            unset($form['previous']);
        }
        
        
        unset($form['_token']);
        
        $drama = Drama::where('id', 1)->first();
        return view('drama.dramaID.index', ['drama' => $drama]);
    }
    
    public function index(Request $request){
        //メモ
        return redirect('admin/news');
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
        return redirect('admin/news');
    }
}
