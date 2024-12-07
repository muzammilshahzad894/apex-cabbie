@extends('layouts.frontend.app')

<style>
    .reset-password-section {
        height: 100vh;
        background-color: #f5f5f5;
    }
    .reset-password-container {
        max-width: 400px;
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
<section class="reset-password-section d-flex align-items-center justify-content-center py-5" style="background-color: #f5f5f5;">
    <div class="reset-password-container bg-white shadow-lg rounded p-5">
        <h3 class="text-center mb-4">Reset Your Password</h3>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- New Password Input -->
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <!-- Confirm Password Input -->
            <div class="mb-4">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <!-- Reset Password Button -->
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>
</section>
@endsection
