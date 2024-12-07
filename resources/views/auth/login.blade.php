@extends('layouts.frontend.app')

<style>
    .login-section {
        height: 100vh;
        background-color: #f5f5f5;
    }
    .login-container {
        max-width: 500px;
        width: 100%;
        border-radius: 8px;
    }
    .form-label {
        font-weight: 500;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px;
    }
    .btn-primary {
        padding: 12px;
        border-radius: 8px;
        background: #E1CB83 !important;
        border: none !important;
    }
    .btn-primary:hover {
        background: #D3B26D !important;
    }
    .text-muted {
        color: #6c757d !important;
    }
</style>
@section('content')
<section class="login-section d-flex align-items-center justify-content-center py-5" style="background-color: #f5f5f5;">
    <div class="login-container bg-white shadow-lg rounded p-5">
        <h3 class="text-center mb-4">Login</h3>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Remember Me Checkbox -->
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember Me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-muted">Forgot Password?</a>
            </div>
            <!-- Login Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <p class="text-muted">Don't have an account? <a href="/register">Sign Up</a></p>
        </div>
    </div>
</section>

@endsection