<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // idはユーザーに編集できないようにする
    protected $guarded = array('id');
    // 編集できる属性のみ設定する
    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );
}
