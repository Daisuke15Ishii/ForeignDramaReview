<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        //title&seasonのuniqueチェックを後で実装
        'user_id' => 'required|exists:users,id',
        'title' => 'required',
        'season' => 'required',
        'cast' => 'string|size:100',
        'country' => 'string|max:50',
        'comment' => 'max:500',
        'url' => 'url' //参考URL
    );

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
