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
