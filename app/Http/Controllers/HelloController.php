<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        $items = DB::table('people')->orderBy('age', 'asc')->get();
        // ビューで$itemsが使用できるようにitemsを渡す
        return view('hello.index', ['items' => $items]);
    }

    // showページへのリンクを押した時点で$requestをlaravelが生成
    public function show(Request $request) {
        // リクエストに含まれるpageを取得
        $page = $request->page;
        // 4つ目以降のインスタンスを3つ取得する
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    // web.php(ルーティング)からコントローラーにリクエストが届いた時にlaravelが$requestを作成
    public function edit(Request $request) {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request) {
        // リクエストから送られてきた情報を格納
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DBを書き換える
        DB::table('people')->where('id', $request->id)->update($param);
        // 一覧ページにリダイレクトする
        return redirect('/hello');
    }

    public function del(Request $request) {
        // 該当idのインスタンスを取得して変数に格納
        $item = DB::table('people')->where('id', $request->id)->first();
        // 削除ページに遷移
        return view('/hello/del', ['form' => $item]);
    }

    public function remove(Request $request) {
        // DBから削除する
        DB::table('people')->where('id', $request->id)->delete();
        // 一覧ページに戻る
        return redirect('/hello');
    }
}