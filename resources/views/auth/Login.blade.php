@extends('Layout.main')

@section('title', 'Login Page')

@section('content')
<main class="form-signin w-100 m-auto mt-5">
    <form action="{{ route('Login.post') }}" method="POST">
        @csrf

        {{-- Logo --}}
        <div class="text-center mb-4">
            <img class="mb-3" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Sign In to Your Account</h1>
            <p class="text-muted">
                Don't have an account? <a href="{{ url('/register') }}">Register here</a>
            </p>
        </div>

        {{-- Success & Error Messages --}}
        @if(session()->has('success'))
             <x-alert type="success">{{session('success')}}</x-alert>
        @endif
        @if(session()->has('error'))
            <x-alert type="danger">{{session('error')}}</x-alert>
        @endif

        {{-- Email Input --}}
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="emailInput" placeholder="name@example.com" required>
            <label for="emailInput">Email address</label>
        </div>

        {{-- Password Input --}}
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password" required>
            <label for="passwordInput">Password</label>
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberCheck">
            <label class="form-check-label" for="rememberCheck">
                Remember me
            </label>
        </div>

        {{-- Submit Button --}}
        <button class="btn btn-primary w-100 py-2" type="submit">Sign In</button>

        {{-- Footer --}}
        <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }} YourAppName</p>
    </form>
</main>
@endsection
