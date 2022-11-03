<!DOCTYPE html>
   <html lang="ja">
   <head>
   <meta charset="utf-8">
   <title>編集</title>
   </head>
   <body>
   <ul>
   <h2>編集</h2>
  <h1>
  <a href="{{ route('item.index') }}" class="header-menu">Back</a>
  <style>body{background-color: tomato;}</style>
  </h1>
  <form method="post" action="{{ route('item.update', $item->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
<table border="1">
<tr>
<th>商品名</th>
<th>商品説明</th>
<th>値段</th>
<th>在庫の有無</th>
</tr>
<tr>
<td>
<input type="text" name="goods" placeholder="名前" value="{{ old('goods', $item->goods) }}">
@if ($errors->has('goods'))
<span class="error">{{ $errors->first('goods') }}</span>
@endif
</td>
<td>
<textarea name="detail" placeholder="説明" value="{{ old('detail', $item->detail) }}">{{ old('detail', $item->detail) }}</textarea>
@if ($errors->has('detail'))
<span class="error">{{ $errors->first('detail') }}</span>
@endif
</td>
<td>
{{ old('price', $item->price) }}円<input type="hidden" name="price" value="{{ old('price', $item->price) }}">
@if ($errors->has('price'))
<span class="error">{{ $errors->first('price') }}</span>
@endif
</td>
<td>
<input type="text" name="stock" placeholder="在庫" value="{{ old('stock', $item->stock) }}">
@if ($errors->has('stock'))
<span class="error">{{ $errors->first('stock') }}</span>
@endif
<td>
</tr>
</table>
<input type="submit" value="Update">
</form>
</body>
</html>

