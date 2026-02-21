{{-- helloappページを継承 --}}
@extends('layouts.helloapp')
{{-- helloappページでタイトルをEditにする --}}
@section('title', 'Edit')
{{-- セクションmenubarで表示する内容 --}}
@section('menubar')
  {{-- 親要素を表示する --}}
  @parent
  {{-- helloappページの@showの場所に表示する文字列 --}}
  更新ページ
@endsection  {{-- editページでのmenubarセクションはここで終了 --}}

@section('content')  
  {{-- URLの末尾が/hello/editに送信する --}}
  {{-- web.php(ルーティング)でメソッドがpost、URLの末尾が/hello/editのものを探し、コントローラーの該当メソッドに渡す --}}
  <form action="/hello/edit" method="post">  
    @csrf
    {{-- 送信時インスタンスを特定するためにidの値を取得する --}}
    <input type="hidden" name="id" value="{{ $form->id }}">
    <label for="name">name:</label>
    <div>
      <input type="text" name="name" value="{{ $form->name }}">
    </div>
    <label for="mail">mail:</label>
    <div>
      <input type="text" name="mail" value="{{ $form->mail }}">
    </div>
    <label for="age">age:</label>
    <div>
      <input type="number" name="age" value="{{ $form->age }}">
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection

@section('footer')
copyright 2026 kamon.
@endsection