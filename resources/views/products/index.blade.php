@extends('layouts.app')

@section('content')

<h2>Products</h2>

<a href="/products/create" style="background:green; color:white; padding:10px; text-decoration:none;
margin-bottom:10px;">Add Product</a>
<form method="GET" action="{{ route('products.index') }}">

<input type="text" name="search" placeholder="Search product or SKU" style="padding:10px; width:200px; margin-left:800px; border:1px solid #ccc; border-radius:5px; ">

<button type="submit" style="background:#3498db; color:white; border:none; padding:10px 14px; border-radius:5px; cursor:pointer;">Search</button>

</form>

<br>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse; background:white; margin-top:20px;">

<tr>
<th>Id</th>
<th>Name</th>
<th>SKU</th>
<th>Stock</th>
<th>Category</th>
<th>Unit</th>
<th>Action</th>
</tr>

@foreach($products as $product)

<tr>
<td>{{$product->id}}</td>
<td>{{$product->name}}</td>
<td>{{$product->sku}}</td>
<td>{{$product->stock}}</td>
<td>{{$product->category}}</td>
<td>{{$product->unit}}</td>
<td>
<a href="/products/{{$product->id}}/edit">
    <button>Edit</button>
    </a>

    <form action="/products/{{$product->id}}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')

    <button style="background:red">Delete</button>

    </form>
</td>
</tr>

@endforeach

</table>

<br>

{{ $products->links()}}

@endsection