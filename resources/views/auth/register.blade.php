@extends('layouts.guest')

@section('content')

<h3 class="auth-title">Create Account</h3>

<form method="POST" action="{{ route('register') }}">
@csrf

<div class="mb-2">
<input type="text" name="name" class="form-control" placeholder="Full Name" required>
</div>

<div class="mb-2">
<input type="email" name="email" class="form-control" placeholder="Email Address" required>
</div>

<div class="mb-2">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>

<div class="mb-3">
<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
</div>

<button class="btn btn-success auth-btn">
Register
</button>

</form>

<div class="auth-link">

<p>
Already have an account?
<a href="{{ route('login') }}">Login</a>
</p>

</div>

@endsection