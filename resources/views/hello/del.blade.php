@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
  @parent
  削除ページ
@endsection

@section('content')
  {{-- 他のページから遷移してきた時に表示するテーブル --}}
  <table>
    <tr><th>name:</th><td>{{ $form->name }}</td></tr>
    <tr><th>mail:</th><td>{{ $form->mail }}</td></tr>
    <tr><th>age:</th><td>{{ $form->age }}</td></tr>
  </table>
  <form action="/hello/del" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div><input type="submit" value="削除"></div>
  </form>
@endsection

@section('footer')
  copyright 2026 kamon.
@endsection