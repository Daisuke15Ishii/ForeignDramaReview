<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'drama_id' => 'required',
        'user_id' => 'required',

        //いずれかの評価が入力されている場合、他の評価項目も必須入力
        'total_evaluation' => 'nullable|between:0,100|numeric|required_with:story_evaluation|required_with:review_title',
        'story_evaluation' => 'nullable|between:0,5|numeric|required_with:world_evaluation',
        'world_evaluation' => 'nullable|between:0,5|numeric|required_with:cast_evaluation',
        'cast_evaluation' => 'nullable|between:0,5|numeric|required_with:char_evaluation',
        'char_evaluation' => 'nullable|between:0,5|numeric|required_with:visual_evaluation',
        'visual_evaluation' => 'nullable|between:0,5|numeric|required_with:music_evaluation',
        'music_evaluation' => 'nullable|between:0,5|numeric|required_with:total_evaluation',
        'progress' => 'required',
        'subtitles' => 'boolean|required_with:total_evaluation',
        
        //下記のいずれかの項目が入力されている場合、他の項目も必須入力
        'review_title' => 'max:100|required_with:review_comment',
        'review_comment' => 'max:5000|required_with:review_title',
        'spoiler_alert' => 'boolean|required_with:review_comment',
        'previous' => 'in:0,1,2|required_with:review_comment'
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

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function likesUser()
    {
        return $this->belongsToMany('App\User','likes','review_id');
    }
    
   
}
