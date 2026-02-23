@extends('layouts.helloapp')

@section('title', 'Person.add')

@section('menubar')
    新規作成ページ
@endsection

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form action="/person/add" method="post">
        @csrf
        <label for="">name:</label>
        <div>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <label for="">mail:</label>
        <div>
            <input type="text" name="mail" value="{{ old('mail') }}">
        </div>
        <label for="">age:</label>
        <div>
            <input type="number" name="age" value="{{ old('age') }}">
        </div>
        <div>
            <input type="submit" value="作成">
        </div>
    </form>
@endsection

@section('footer')
    copyright 2026 kamon.
@endsection