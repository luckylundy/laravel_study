<?php

namespace App\Http\Controllers;
use App\Models\Board;
use Illuminate\Http\Request;


class BoardController extends Controller
{
    public function index(Request $request) {
        // リレーションでのデータ取得にはwithを使用してDBへの問い合わせは減らす
        $items = Board::with('person')->get();
        // $items = Board::all();
        // 一覧ページを表示
        return view('board.index', ['items' => $items]);
    }

    public function add(Request $request) {
        // 新規投稿ページを表示する
        return view('board.add');
    }

    public function create(Request $request) {
        // バリエーションに通った値のみ取得する
        $form = $request->validate(Board::$rules);
        // Boardインスタンスを作成
        $board = new Board;
        // Boardインスタンスに$formの値を代入し、DBに保存
        $board->fill($form)->save();
        // 一覧ページにリダイレクト
        return redirect('/board');
    }
}
