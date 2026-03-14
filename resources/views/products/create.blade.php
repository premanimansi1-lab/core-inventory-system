@extends('layouts.app')

@section('content')

<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}">

@csrf

<label>Product Name</label>
<br>
<input type="text" name="name" required>

<br><br>

<label>SKU</label>
<br>
<input type="text" name="sku" required>
@error('sku')
<p style="color:red">{{ $message }}</p>
@enderror

<br><br>

<label>Category</label>
<br>
<input type="text" name="category">

<br><br>

<label>Unit</label>
<br>
<select name="unit">
<option value="pcs">Pieces</option>
<option value="kg">Kilogram</option>
<option value="box">Box</option>
<option value="meter">Meter</option>
</select>

<br><br>

<label>Initial Stock</label>
<br>
<input type="number" name="stock" value="0">

<br><br>

<button type="submit">Save Product</button>

</form>

@endsection