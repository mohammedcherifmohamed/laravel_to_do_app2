@extends('Layout.main')

@section('title', 'Register Page')

@section('content')
<main class="form-signin w-100 m-auto mt-5">
    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Logo & Heading --}}
        <div class="text-center mb-4">
            <img class="mb-3" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Create a New Account</h1>
            <p class="text-muted">
                Already have an account? <a href="{{ url('/login') }}">Login here</a>
            </p>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Name --}}
        <div class="form-floating mb-3">
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Your Name" value="{{ old('name') }}" required>
            <label for="nameInput">Full Name</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="emailInput">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" placeholder="Password" required>
            <label for="passwordInput">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password Confirmation --}}
        <div class="form-floating mb-3">
            <input name="password_verififcation" type="password" class="form-control @error('password_verififcation') is-invalid @enderror" id="confirmPasswordInput" placeholder="Confirm Password" required>
            <label for="confirmPasswordInput">Confirm Password</label>
            @error('password_verififcation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-5">
            <input name="image" type="file"  id="image" >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberCheck">
            <label class="form-check-label" for="rememberCheck">
                Remember me
            </label>
        </div>

        {{-- Submit Button --}}
        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>

        {{-- Footer --}}
        <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }} YourAppName</p>
    </form>
</main>
@endsection
