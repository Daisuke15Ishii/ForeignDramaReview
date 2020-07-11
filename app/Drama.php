<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drama extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        //title&seasonのuniqueチェックを後で実装
        'title' => 'required',
        'season' => 'required',
        'title_en' => 'alpha-num|alpha-dash',
        'copyright' => 'required_with:image_path', //画像の添付があればcopyright表記は必須
        'url' => 'url|required_with:introduction' //作品概要があれば参照URLは必須
    );
    
    //他のモデルに関連付けを後で実装
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function score()
    {
        return $this->hasOne('App\Score');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
    
    public function favoritesUser()
    {
        return $this->belongsToMany('App\User','favorites','drama_id');
    }

    public function janre()
    {
        return $this->belongsToMany('App\Janre');
    }


/*　利用不可(usersテーブルにreview_idカラムがないので紐づけ出来ない？)
    public function reviewUsers()
    {
        return $this->hasManyThrough('App\User','App\Review');
    }
*/

}
