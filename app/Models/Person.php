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

    // Personモデルを使用するとき、毎回必ず「年齢が20以上」という条件がつくようになる
    // このモデルが使われる時、最初に自動で実行される準備メソッド
    // protected static function boot() {
    //     // まず親クラス（Model）の準備を先にやっておく
    //     parent::boot();

    //     // 'age'はスコープの名前
    //     static::addGlobalScope('age',   
    //         // 自動で実行する処理
    //         function (Builder $builder) {
    //             // 処理の中身(年齢が20以上)
    //             $builder->where('age', '>', 20);
    //         }
    //     );
    // }
}
