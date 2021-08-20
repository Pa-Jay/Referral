@extends('layouts.auth')
@section('content')
<div class="auth-form">
    <h4 class="text-center mb-4">Sign up your account</h4>
    @foreach ($errors->all() as $err)
        <p class="text-danger">{{ $err }}</p>
    @endforeach
    <form action="{{ route('login') }}" method="POST">@csrf
        <div class="form-group">
            <label class="mb-1"><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" placeholder="">
        </div>
        <div class="form-group">
            <label class="mb-1"><strong>Password</strong></label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Register </a></p>
    </div>
</div>
@endsection
{{--  --}}
