@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧画面</title>
</head>
<body>
<div class="container">
<table border="1">
<tr>
<th>商品名</th>
<th>値段</th>
<th>在庫の有無</th>
</tr>
@foreach ($items as $item)
<tr>
<td><a href="{{ route('item.profile', ['id' => $item['id']]) }}">{{ $item['goods'] }}</a></td>
<td>{{ $item['price'] }}</td>
<td>
@if ($item['stock'] > 0)
在庫あり
@else
在庫無し
@endif
</td>
</tr>
@endforeach
</table>
@endsection
</body>
</html>
