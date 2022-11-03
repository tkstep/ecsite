<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>New Item</title>
</head>
<body>
<ul>
<h2>商品追加</h2>
<h1>
<a href="{{ route('item.index') }}" class="header-menu">Back</a>
<style>body{background-color: tomato;}</style>
</h1>
<form method="post" action="{{ route('item.store') }}">
{{ csrf_field() }}
<p>
<input type="text" name="goods" placeholder="名前" value="{{ old('goods') }}">
@if ($errors->has('goods'))
<span class="error">{{ $errors->first('goods') }}</span>
@endif
</p>
<p>
<textarea name="detail" placeholder="説明" value="{{ old('detail') }}"></textarea>
@if ($errors->has('detail'))
<span class="error">{{ $errors->first('detail') }}</span>
@endif
</p>
<p>
<input type="text" name="price" placeholder="値段" value="{{ old('price') }}">
@if ($errors->has('price'))
<span class="error">{{ $errors->first('price') }}</span>
@endif
</p>
<p>
<input type="text" name="stock" placeholder="在庫" value="{{ old('stock') }}">
@if ($errors->has('stock'))
<span class="error">{{ $errors->first('stock') }}</span>
@endif
</p>
<p>
<input type="submit" value="Add">
</p>
</form>
</ul>
</body>
</html>

