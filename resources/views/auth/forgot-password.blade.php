@extends('layouts.guest')

@section('content')

<h3 class="auth-title">Reset Password</h3>

<p style="text-align:center;margin-bottom:20px">
Enter your email and we will send you a password reset link.
</p>

@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
@csrf

<div class="mb-3">
<input 
type="email" 
name="email" 
class="form-control" 
placeholder="Enter your email"
required
>
</div>

<button class="btn btn-primary auth-btn">
Send Reset Link
</button>

</form>

<div class="auth-link">

<p>
Remember your password?
<a href="{{ route('login') }}">Login</a>
</p>

</div>

@endsection