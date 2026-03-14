@extends('layouts.app')

@section('content')

<h2>Add Stock Movement</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('movements.store') }}">

@csrf

<label>Product</label>
<br>

<select name="product_id">

@foreach($products as $p)

<option value="{{$p->id}}">
{{$p->name}} ({{$p->sku}})
</option>

@endforeach

</select>

<br><br>

<label>Quantity</label>
<br>
<input type="number" name="qty" required>

<br><br>

<label>Type</label>
<br>

<select name="type">

<option value="receipt">Receipt (Stock In)</option>

<option value="delivery">Delivery (Stock Out)</option>

</select>

<br><br>

<button type="submit">Save Movement</button>

</form>

@endsection