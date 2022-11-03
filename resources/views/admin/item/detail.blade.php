<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品詳細画面</title>
</head>
<body>
<table border="1">
<tr>
<th>商品名</th>
<th>商品説明</th>
<th>値段</th>
<th>在庫の有無</th>
</tr>
<tr>
<td>{{ $item['goods'] }}</td>
<td>{{ $item['detail'] }}</td>
<td>{{ $item['price'] }}</td>
<td>
@if ($item['stock'] > 0)
在庫あり
@else
在庫無し
@endif
</td>
</tr>
</table>
</body>
</html>



