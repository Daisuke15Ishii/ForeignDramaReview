<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'drama_id' => 'required|unique',

        //いずれかの評価が入力されている場合、他の評価項目も必須入力
        'average_total_evaluation' => 'between:0,100|numeric|required_with:story_evaluation',
        'median_total_evaluation' => 'between:0,100|numeric|required_with:story_evaluation',
        'average_story_evaluation' => 'between:0,5|numeric|required_with:world_evaluation',
        'average_world_evaluation' => 'between:0,5|numeric|required_with:cast_evaluation',
        'average_cast_evaluation' => 'between:0,5|numeric|required_with:char_evaluation',
        'average_char_evaluation' => 'between:0,5|numeric|required_with:visual_evaluation',
        'average_visual_evaluation' => 'between:0,5|numeric|required_with:music_evaluation',
        'average_music_evaluation' => 'between:0,5|numeric|required_with:total_evaluation',
        'reviews' => 'integer',
        'registers' => 'integer',
        'favorites' => 'integer',
        'rank_average_total_evaluation' => 'integer',
        'previous_require' => 'required|integer',
        'previous_better' => 'required|integer',
        'previous_no' => 'required|integer'
    );
    
    //他のモデルに関連付けを後で実装
    public function drama()
    {
      return $this->belongsTo('App\Drama');
    }

}
