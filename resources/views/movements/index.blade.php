@extends('layouts.app')

@section('content')

<h2>Stock Movements</h2>
<form method="GET" action="{{ route('movements.index') }}" style="margin-bottom:15px">

<select name="status" onchange="this.form.submit()" style="padding:6px;border-radius:5px">

<option value="">All Movements</option>

<option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>
Pending
</option>

<option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>
Approved
</option>

</select>

</form>

<table style="text-align:center; width:100%; border-collapse:collapse; background:white;">

<tr>
<th>Product</th>
<th>Qty</th>
<th>Type</th>
<th>Date</th>
<th>Action</th>
<th>Status</th>
</tr>

@foreach($movements as $m)

<tr>

<td>{{ $m->product->name ?? 'N/A' }}</td>

<td>{{ $m->qty }}</td>

<td>

@if($m->type == 'receipt')
<span style="color:green">Receipt</span>
@else
<span style="color:red">Delivery</span>
@endif

</td>

<td>{{ $m->created_at->format('d M Y H:i') }}</td>

<td>
    <form action="{{ route('movements.destroy', $m->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" style="background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">Delete</button>
    </form>
</td>

<td>

@if($m->status == 'pending' && auth()->user()->role == 'manager')

<form method="POST" action="{{ route('movements.approve',$m->id) }}">
@csrf
<button style="background:green">Approve</button>
</form>

@elseif($m->status == 'approved')

<span style="color:green">Approved</span>

@else

<span style="color:orange">Pending</span>

@endif

</td>

</tr>

@endforeach

</table>

@endsection