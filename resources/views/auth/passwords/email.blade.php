@extends('layouts.frontend.app')

<style>
    .forgot-password-section {
        background-color: #f5f5f5;
    }

    .forgot-password-container {
        max-width: 500px;
        width: 100%;
        border-radius: 8px;
        padding: 30px; /* Reduced padding for compact form */
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

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Disable autofill styling */
    input:-webkit-autofill {
        background-color: #f9f9f9 !important;
        -webkit-box-shadow: 0 0 0px 1000px #f9f9f9 inset !important;
        box-shadow: 0 0 0px 1000px #f9f9f9 inset !important;
    }
</style>

@section('content')
<section class="forgot-password-section d-flex align-items-center justify-content-center py-5" style="background-color: #f5f5f5;">
    <div class="forgot-password-container bg-white shadow-lg rounded">
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

        <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
            @csrf
            <!-- Email Input -->
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder=" " value="{{ old('email') }}" required autocomplete="off">
                <label for="email" class="floating-label">Email Address</label>
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
