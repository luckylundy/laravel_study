<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // idはユーザーに編集できないようにする
    protected $guarded = array('id');

    // staticでインスタンスなしでも使えるようにし、編集できる属性のみ設定する
    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    // 投稿は1人のユーザー(person)モデルと紐づいているのでメソッド名は単数形にする
    public function person() {
        return $this->belongsTo('App\Models\Person');
    }

    public function getData() {
        return $this->id . ': ' . $this->title . ' (' . $this->person->name . ')';
    }
}
