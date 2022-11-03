<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品詳細画面</title>
</head>
<body>
<div class="container">
<table border="1">
<tr>
<th>商品名</th>
<th>商品説明</th>
<th>値段</th>
<th>購入</th>
</tr>
<tr>
<td>{{ $item['goods'] }}</td>
<td>{{ $item['detail'] }}</td>
<td>{{ $item['price'] }}</td>
<td>
@auth
@if (($item->stock) > 0)
<form method="post" action="{{ route('cart.add') }}">
   {{ csrf_field() }}
<input type="hidden" name="item_id" value="{{ $item->id  }}"/>
<form method="post" action="{{ route('cart.add') }}">
<input type="number" value="1" required name="qty"  min="1" max="{{ $item->stock }}" placeholder="個数">
<input type="submit" value="カートに追加">
@if ($errors->has('qty'))
<span class="error">{{ $errors->first('qty') }}</span>
@endif
</form>
@else
<p>在庫無し</p>
@endif
@endauth
@guest
@if (($item->stock) > 0)
<a href="{{ route('home') }}">ログインしてください</a>
@else
<p>在庫無し</p>
@endif
@endguest
</td>
</tr>
</table>
<br>
<a href="{{ route('item.home') }}">商品一覧へ</a>
</body>
</html>
