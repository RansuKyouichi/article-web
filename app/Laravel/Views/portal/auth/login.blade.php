
@extends('portal._layouts.main')

@section('contents')

<div class="login-page">

    <div class="login-card">

    <a class="site-logo" href="{{ route('web.home') }}">
        AMS<span>.</span>
    </a>

        <div class="text-center mb-4">

            <h3 class="login-title mb-1">Welcome back User.</h3>

            <p class="login-subtitle mb-0">
                Sign in to manage your content and website.
            </p>
        </div>

        <form class="login-form" method="POST" action="{{ route('portal.auth.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="Enter your email address"
                    name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="d-flex">
                    <label for="password" class="form-label">
                        Password
                    </label>
                </div>

                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Enter your password"
                    name="password">
                @error('password')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <div class="d-flex align-content-center justify-content-between mb-4">
                <div class="d-flex align-items-center ">
                    <input
                        type="checkbox"
                        class="form-check-input me-2"
                        id="remember"
                        name="remember"
                        value="1"
                    >

                    <label
                        for="remember"
                        class="form-check-label small mb-0"
                    >
                        Remember me
                    </label>
                </div>
                    
                <a href="{{ route('portal.auth.forgot_password') }}" class="login-link small">
                    Forgot password?
                </a>
            </div>

            <button type="submit" class="btn login-btn w-100">Sign In</button>

        </form>

        <div class="text-center mt-4">
            <p class="login-subtitle small mb-0">
                Don't have an account?
                <a href="{{ route('portal.auth.register') }}" class="login-link">
                    Create account
                </a>
            </p>
        </div>

    </div>
</div>

@endsection

@section('page-styles')
    
<style>
    .login-page {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background-color: var(--background-color);
    }

    .login-card {
        width: 100%;
        max-width: 430px;
        padding: 40px;
        background-color: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    }

    .login-title {
        color: var(--primary-color);
        font-weight: 700;
    }

    .login-subtitle {
        color: var(--muted-color);
    }

    .login-form label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .login-form .form-control {
        padding: 12px 14px;
        border: 1px solid var(--border-color);
        border-radius: 7px;
    }

    .login-form .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(200, 117, 77, 0.12);
    }

    .login-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .login-btn:hover {
        background-color: var(--accent-color);
        color: white;
    }

    .login-link {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 600;
    }

    .login-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .login-card {
            padding: 28px 22px;
        }
    }
</style>

@endsection