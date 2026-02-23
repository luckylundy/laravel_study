@extends('layouts.helloapp')

@section('title', 'Person.edit')

@section('menubar')
    @parent
    編集ページ
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
    <form action="/person/edit" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label for="">name:</label>
        <div>
            <input type="text" name="name" value="{{ $form->name }}">
        </div>
        <label for="">mail:</label>
        <div>
            <input type="text" name="mail" value="{{ $form->mail }}">
        </div>
        <label for="">age:</label>
        <div>
            <input type="number" name="age" value="{{ $form->age }}">
        </div>
        <label for=""></label>
        <div>
            <input type="submit" value="更新">
        </div>
    </form>
@endsection

@section('footer')
    copyright 2026 kamon.
@endsection