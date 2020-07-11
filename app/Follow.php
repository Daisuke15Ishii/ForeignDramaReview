<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required|exists:users,id|different:following_user_id',
        'following_user_id' => 'required|exists:users,id|different:user_id'
    );
    
    //他のモデルに関連付けを後で実装
    public function following()
    {
      return $this->belongsTo('App\User','following_user_id');
    }
    
    public function followed()
    {
      return $this->belongsTo('App\User','user_id');
    }
    
    
}
