@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="cards">

<div class="card">
<h3>Total Products</h3>
<h2>{{$totalProducts}}</h2>
</div>

<a href="{{ route('products.lowstock') }}" style="text-decoration:none;color:black">

<div class="card">
<h3>Low Stock</h3>
<h2 style="color:red">{{$lowStock}}</h2>
</div>

</a>

<div class="card">
<h3>Pending Receipts</h3>
<h2>{{$pendingReceipts}}</h2>
</div>

<div class="card">
<h3>Pending Deliveries</h3>
<h2>{{$pendingDeliveries}}</h2>
</div>

</div>


<!-- <br><br> -->
<div style="display:flex;gap:20px;margin-top:20px;">

@if(auth()->user()->role == 'staff')

<div class="card">
<h3>My Pending Requests</h3>
<h2>{{$pendingMovements}}</h2>
</div>

@endif


@if(auth()->user()->role == 'manager')

<div class="card">
<h3>Pending Approvals</h3>
<h2>{{$pendingMovements}}</h2>
</div>

@endif

</div>

<!-- <h3>Recent Stock Movements</h3>

<table style="text-align:center; width:100%; border-collapse:collapse; background:white;">

<tr>
<th>Product</th>
<th>Quantity</th>
<th>Type</th>
<th>Date</th>
</tr>

@foreach($recentMovements as $m)

<tr>

<td>{{$m->product->name}}</td>

<td>{{$m->qty}}</td>

<td>

@if($m->type == 'receipt')
<span style="color:green">+ {{$m->type}}</span>
@else
<span style="color:red">- {{$m->type}}</span>
@endif

</td>

<td>{{$m->created_at->format('d M Y')}}</td>

</tr>

@endforeach

</table> -->

@endsection