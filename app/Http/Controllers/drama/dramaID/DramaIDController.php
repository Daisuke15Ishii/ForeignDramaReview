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

class DramaIDController extends Controller
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
    
    public function index(Request $request,$drama_id){
        //画面表示確認のため仮設定
        $drama = Drama::find($drama_id);
        $reviews = $drama->reviews()->paginate(5);
        $allreviews = $drama->reviews()->count();
        return view('drama.dramaID.index', ['drama' => $drama, 'reviews' => $reviews, 'allreviews' => $allreviews]);
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
