<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'drama_id' => 'required|exists:dramas,id',
        'user_id' => 'required|exists:users,id',
        'review_id' => 'required|exists:reviews,id',

        //いずれかの評価が入力されている場合、他の評価項目も必須入力
        'want' => 'boolean|required',
        'watching' => 'boolean|required',
        'watched' => 'boolean|required',
        'stop' => 'boolean|required',
        'uncategorized' => 'boolean|required',
        'favorite' => 'boolean|required',
        'comment' => 'max:100'

    );
    
    //他のモデルに関連付けを後で実装
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    
    public function drama()
    {
      return $this->belongsTo('App\Drama');
    }
    
    public function review()
    {
      return $this->belongsTo('App\Review');
    }
    
}
