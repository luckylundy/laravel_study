<html>
<head>
    <title>Hello/Index</title>
    <style>
        body {font-size:16pt; color:#777; }
        h1 { font-size:40pt; text-align:right; color:#d0d0f0;
            margin:-20px 0px 0px 0px; }
    </style>
</head>
<body>
@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>{{$msg}}</p>
    <form action="/hello" method="post">
        @csrf
        <div>
            <label style="display:inline-block; width:75px;" for="name">name: </label>
            <input type="text" name="name" value="{{ old('name') }}">
            {{-- nameのフィールドでエラーがあれば表示 --}}
            @if ($errors->has('name'))
                <p style="font-size:10pt; margin-top:0px;">
                    {{-- $errorsの中でname属性の最初のものを表示する --}}
                    ERROR:{{ $errors->first('name') }}
                </p>
            @endif
        </div>
        <div>
            <label style="display:inline-block; width:75px;" for="mail">mail: </label>
            <input type="text" name="mail" value="{{ old('mail') }}">
            @error('mail')
                <p style="font-size:10pt; margin-top:0px;">
                    ERROR:{{ $errors->first('mail') }}
                </p>
            @enderror
        </div>
        <div>
            <label style="display:inline-block; width:75px;" for="age">age: </label>
            <input type="number" name="age" value="{{ old('age') }}">
            @error('age')
                <p style="font-size:10pt; margin-top:0px;">
                    ERROR:{{ $errors->first('age') }}
                </p>
            @enderror
            <input type="submit" value="送信">
        </div>
    </form>
@endsection

@section('footer')
    copyright 2025 tuyano.
@endsection
</body>
</html>