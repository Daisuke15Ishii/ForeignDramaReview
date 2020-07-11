<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DramaJanre extends Model
{
    //中間テーブル名は「単数形_単数形」だが、テーブル名は複数形でないとモデルと紐づかないので別途テーブル名を定義
    protected $table = 'drama_janre';
    
    protected $guarded = array('id');

    public static $rules = array(
        'drama_id' => 'required|exists:dramas,id',
        'janre_id' => 'required|exists:janres,id'
    );
    
}
