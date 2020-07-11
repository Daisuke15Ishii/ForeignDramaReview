<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required|exists:users,id',
        'review_id' => 'required|exists:reviews,id'
    );
    
    //他のモデルに関連付けを後で実装
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    
    public function review()
    {
      return $this->belongsTo('App\Review');
    }
    
    
}
