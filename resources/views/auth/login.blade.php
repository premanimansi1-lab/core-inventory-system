@extends('layouts.guest')

@section('content')

<h3 class="auth-title">Login</h3>

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>

<div style="text-align:right;margin-bottom:15px">

<a href="{{ route('password.request') }}">
Forgot Password?
</a>

</div>

<button class="btn btn-primary auth-btn">
Login
</button>

</form>

<div class="auth-link">

<p>
Don't have an account?
<a href="{{ route('register') }}">Register</a>
</p>

</div>

@endsection