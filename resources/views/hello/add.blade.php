@extends('layouts.helloapp')

@section('title', 'Add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
  <form action="/hello/add" method="post">
    @csrf
    <label for="name">name:</label>
    <div><input type="text" name="name"></div>
    <label for="mail">mail:</label>
    <div><input type="text" name="mail"></div>
    <label for="age">age:</label>
    <div><input type="number" name="age"></div>
    <div><input type="submit" value="send"></div>
  </form>
@endsection

@section('footer')
copyright 2025 tuyano.
@endsection
