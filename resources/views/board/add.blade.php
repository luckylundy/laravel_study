@extends('layouts/helloapp')

@section('title', 'Board.add')

@section('menubar')
    @parent
    投稿ページ
@endsection

@section('content')
    <form action="/board/add" method="post">
        @csrf
        <label for="">person id: </label>
        <div>
            <input type="number" name="person_id">
        </div>
        <label for="">title: </label>
        <div>
            <input type="text" name="title">
        </div>
        <label for="">message: </label>
        <div>
            <input type="text" name="message">
        </div>
        <div>
            <input type="submit" value="投稿">
        </div>
    </form>
@endsection

@section('footer')
    copyright 2026 kamon.
@endsection