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
<style>
    nav {margin: 10px;}
    nav span {margin:5px; font-size:12pt;}
    nav a {margin:5px; font-size:12pt;}
    nav div {margin:0px; font-size:12pt;}
    svg {width:25px; height:25px; margin-bottom: -7px;}
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
</style>
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th><a href="/hello?sort=name">Name</a></th>
            <th><a href="/hello?sort=mail">Mail</a></th>
            <th><a href="/hello?sort=age">Age</a></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
    {{-- ページネーション --}}
    {{ $items->appends(['sort' => $sort])->links() }}
@endsection

@section('footer')
    copyright 2025 tuyano.
@endsection
</body>
</html>