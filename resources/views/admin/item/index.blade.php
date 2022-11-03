@extends('layouts.app_admin')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧画面</title>
</head>
<body>
<li><a href="{{ route('item.create') }}">商品追加</a></li>
@if (session('flash_message'))
<div class="alert alert-danger">
{{ session('flash_message') }}
</div>
@endif
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<table class="table">
<tr>
<th>商品名</th>
<th>値段</th>
<th>在庫の有無</th>
</tr>
@foreach ($items as $item)
<tr>
<td><a href="{{ route('item.detail', ['id' => $item['id']]) }}">{{ $item['goods'] }}</a>
<a href="{{ route('item.edit', $item) }}" class="edit">[編集]</a>
</td>
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
</div>
</div>
</div>
</div>
@endsection
</body>
</html>
