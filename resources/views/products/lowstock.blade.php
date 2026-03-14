@extends('layouts.app')

@section('content')

<h2>Low Stock Products</h2>

<table>

<tr>
<th>Name</th>
<th>SKU</th>
<th>Category</th>
<th>Unit</th>
<th>Stock</th>
</tr>

@foreach($products as $product)

<tr style="background:#f8d7da;text-align:center;">

<td>{{$product->name}}</td>
<td>{{$product->sku}}</td>
<td>{{$product->category}}</td>
<td>{{$product->unit}}</td>
<td style="color:red">{{$product->stock}}</td>

</tr>

@endforeach

</table>

@endsection