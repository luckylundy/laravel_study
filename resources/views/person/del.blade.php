@extends('layouts.helloapp')

@section('title', 'Person.delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <table>
        <tr>
            <th>name:td </th>
            <td>{{ $form->name }}</td>
        </tr>
        <tr>
            <th>mail: </th>
            <td>{{ $form->mail }}</td>
        </tr>
        <tr>
            <th>age: </th>
            <td>{{ $form->age }}</td>
        </tr>
    </table>
    <form action="/person/del" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <input type="submit" value="削除">
    </form>
@endsection

@section('footer')
    copyright 2026 kamon.
@endsection