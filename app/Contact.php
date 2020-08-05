<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'corporation' => 'nullable',
        'corporation_kana' => 'nullable',
        'name' => 'required',
        'name_kana' => 'required',
        'phone' => 'nullable|numeric|digits-between:9,15', //ハイフン不要
        'mail' => 'required|email',
        'comment' => 'required|max:4000',
    );
}
