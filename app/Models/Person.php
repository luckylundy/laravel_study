<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    // DBにcreated_atとupdated_atがない場合はlaravelにこれらのデータを保存しないよう明記する
    public $timestamps = false;
    // idをユーザーが勝手に変更できないようにする
    protected $guarded = array('id');

    // 各属性のバリデーション、コントローラーで実行する
    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    // Personモデルが主、Boardモデルが従の関係を1対他の形で関連づけ、メソッド名は複数形にする
    public function boards() {
        return $this->hasMany('App\Models\Board');
    }

    public function getData() {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    // 名前で検索をするときの条件をscopeで関数にしたもの
    public function scopeNameEqual($query, $str) {
        // $queryはlaravelが用意してくれる、name属性と入力値$strを比較する
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n) {
        // whereの中身が$nより大きいage属性のPersonデータを返す
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n) {
        // whereの中身が$nより小さいage属性のPersonデータを返す
        return $query->where('age', '<=', $n);
    }

}
