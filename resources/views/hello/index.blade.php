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
    <table>
  <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->mail}}</td>
      <td>{{$item->age}}</td>
    </tr>
  @endforeach
  </table>
  @endsection

  @section('footer')
  copyright 2025 tuyano.
  @endsection
</body>
</html>