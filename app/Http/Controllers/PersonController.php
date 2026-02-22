<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request) {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request) {
        // 最初にページを表示するとき空文字を渡さないとエラーになる
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request) {
        // 最小値を設定
        $min = $request->input * 1;
        // 最大値を設定
        $max = $min + 10;
        // $minより大きく、$maxより小さくて最初に見つかったレコードを返す
        $item = Person::ageGreaterThan($min)->AgeLessThan($max)->first();
        // 入力値と検索結果を$paramに格納する
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    public function add(Request $request) {
        return view('person.add');
    }

    public function create(Request $request) {
        // ユーザーのリクエストデータがルールに則っているか確認
        $request->validate(Person::$rules);
        // Personクラスのインスタンスを作成
        $person = new Person;
        // ユーザーが送信したデータを配列にして全て取得する
        $form = $request->all();
        // そのままだとエラーになるので、配列から_tokenを取り除く
        unset($form['_token']);
        // personの属性にそれぞれの値をセットしてDBに保存する
        $person->fill($form)->save();
        // 「/person」にリダイレクトする
        return redirect('/person');
    }
}
