@extends('layouts.auth')
@section('content')
<div class="auth-form">
    <h4 class="text-center mb-4">Sign up your account</h4>
    @foreach ($errors->all() as $err)
        <p class="text-danger">{{ $err }}</p>
    @endforeach
    <form action="{{ route('register') }}" method="POST">@csrf
        <div class="form-group">
            <label class="mb-1"><strong>Username</strong></label>
            <input type="text" class="form-control" name="username" placeholder="">
        </div>
        <div class="form-group">
            <label class="mb-1"><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" placeholder="">
        </div>
        <div class="form-group">
            <label class="mb-1"><strong>Wallet Address (LTC)</strong></label>
            <input type="text" class="form-control" name="address" placeholder="">
        </div>
        <div class="form-group">
            <label class="mb-1"><strong>Password</strong></label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label class="mb-1"><strong>Refferal code</strong></label>
            <input type="text" class="form-control" name="ref_code" placeholder="">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
{{--  --}}
