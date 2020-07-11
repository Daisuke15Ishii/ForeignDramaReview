<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Janre extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'janre' => 'required|string'
    );
    
    //他のモデルに関連付けを後で実装
    public function dramas()
    {
      return $this->belongsToMany('App\Drama');
    }
    
}
