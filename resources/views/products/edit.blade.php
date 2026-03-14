@extends('layouts.app')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update',$product->id) }}">

@csrf
@method('PUT')

<label>Product Name</label>
<br>
<input type="text" name="name" value="{{$product->name}}" required>

<br><br>

<label>SKU</label>
<br>
<input type="text" name="sku" value="{{$product->sku}}" required>

<br><br>

<label>Category</label>
<br>
<input type="text" name="category" value="{{$product->category}}">

<br><br>

<label>Unit</label>
<br>
<select name="unit">

<option value="pcs" {{ $product->unit == 'pcs' ? 'selected' : '' }}>Pieces</option>

<option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>Kilogram</option>

<option value="box" {{ $product->unit == 'box' ? 'selected' : '' }}>Box</option>

<option value="meter" {{ $product->unit == 'meter' ? 'selected' : '' }}>Meter</option>

</select>

<br><br>

<label>Stock</label>
<br>
<input type="number" name="stock" value="{{$product->stock}}">

<br><br>

<button type="submit">Update Product</button>

</form>

@endsection