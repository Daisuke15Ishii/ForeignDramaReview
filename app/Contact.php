<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'name_kana' => 'required',
        'phone' => 'required|numeric|digits-between:9,15', //ハイフン不要
        'mail' => 'required|email',
        'comment' => 'required|size:4000',
    );
}
