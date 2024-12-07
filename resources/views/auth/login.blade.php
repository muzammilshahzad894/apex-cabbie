@extends('layouts.frontend.app')

<style>
    .login-section {
        background-color: #f5f5f5;
    }
    .login-container {
        max-width: 500px;
        width: 100%;
        border-radius: 8px;
        padding: 30px;
        margin-top: 30px;
    }
    .form-group {
        position: relative;
        margin-bottom: 15px; /* Reduced margin to make the form more compact */
    }
    input.form-control {
        width: 100%;
        padding: 10px 12px; /* Reduced padding for input fields */
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none; /* Removes the default outline on focus */
        background-color: #f9f9f9;
    }
    input.form-control:focus {
        border-color: #E1CB83; /* Change border color when focused */
        box-shadow: none; /* Ensure no shadow is shown */
    }
    input.form-control:focus ~ .floating-label,
    input.form-control:not(:placeholder-shown) ~ .floating-label {
        top: -8px;
        left: 15px;
        font-size: 12px;
        color: #E1CB83;
    }
    .floating-label {
        position: absolute;
        top: 16px;
        left: 15px;
        font-size: 16px;
        color: #aaa;
        transition: 0.3s ease all;
        pointer-events: none;
    }
    .btn-primary {
        padding: 10px;
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

    /* Disable autofill styling */
    input:-webkit-autofill {
        background-color: #f9f9f9 !important;
        -webkit-box-shadow: 0 0 0px 1000px #f9f9f9 inset !important;
        box-shadow: 0 0 0px 1000px #f9f9f9 inset !important;
    }
</style>

@section('content')
<section class="login-section d-flex align-items-center justify-content-center py-5" style="background-color: #f5f5f5;">
    <div class="login-container bg-white shadow-lg rounded">
        <h3 class="text-center mb-4">Login</h3>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" autocomplete="off" onsubmit="document.getElementById('submit-btn').disabled = true; document.getElementById('submit-btn').innerHTML = 'Loading...';">
            @csrf
            <!-- Email Input -->
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder=" " value="{{ old('email') }}" required autocomplete="off">
                <label for="email" class="floating-label">Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Password Input -->
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder=" " required autocomplete="new-password">
                <label for="password" class="floating-label">Password</label>
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
            <button type="submit" class="btn btn-primary w-100" id="submit-btn">Login</button>
        </form>
        <div class="text-center mt-3">
            <p class="text-muted">Don't have an account? <a href="/register">Sign Up</a></p>
        </div>
    </div>
</section>
@endsection
