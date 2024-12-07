@extends('layouts.frontend.app')
<style>
    .forgot-password-section {
        height: 100vh;
        background-color: #f5f5f5;
    }

    .forgot-password-container {
        max-width: 500px;
        width: 100%;
        border-radius: 8px;
        padding: 40px;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
    }

    .message {
        font-size: 14px;
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

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
@section('content')
<section class="forgot-password-section d-flex align-items-center justify-content-center py-5" style="background-color: #f5f5f5;">
    <div class="forgot-password-container bg-white shadow-lg rounded p-5">
        <h3 class="text-center mb-3">Forgot Your Password?</h3>
        <p class="text-center mb-3 text-muted message">No worries! Just enter your email, and we'll send you a link to reset your password.</p>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your registered email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Send Reset Link Button -->
            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>
        <div class="text-center mt-3">
            <p class="text-muted">Remembered your password? <a href="/login">Login</a></p>
        </div>
    </div>
</section>
@endsection