@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>カート画面</title>
</head>
<body>
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
<th>購入数</th>
<th>合計金額</th>
<th>削除</th>
</tr>
@foreach ($carts as $cart)
<tr>
<td>{{ $cart->item->goods }}</td>
<td>{{ number_format($cart->item->price) }}</td>
<td>{{ $cart['quantity'] }}</td>
<td>{{ $cart['quantity'] * number_format($cart->item->price) }}</td>
<td>
<form method="post" action="{{ route('cart.del') }}">
	{{ csrf_field() }}
<input type="hidden" name="item_id" value="{{ $cart->item->id }}">
<input type="submit" value="カートから削除する">
</form>
</td>
</tr>
@endforeach
<tr style="font-size:20px;">
@if (count($carts) === 0)
<td colspan=5 style="font-size:30px; text-align:center;">カートが空です。</td>
@else
<td colspan=3>全商品の合計金額</td>
<td colspan=2>{{ number_format($totals) }}</td>
@endif
</tr>
</table>
</div>
</div>
</div>
</div>
@endsection
</body>
</html>
