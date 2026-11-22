
@extends('portal._layouts.main')

@section('contents')

<div class="register-page">
    <div class="register-card">

        <div class="text-center mb-4">
            <a class="site-logo" href="{{ route('web.home') }}">
                AMS<span>.</span>
            </a>

            <h3 class="register-title mb-1">Create an account.</h3>

            <p class="register-subtitle mb-0">
                Get started with your AMS User account.
            </p>
        </div>

        <form class="register-form" method="POST" action="{{ route('portal.auth.store') }}">  
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">
                    First Name
                </label>

                <input
                    type="text"
                    class="form-control @error('first_name') is-invalid @enderror"
                    id="name"
                    placeholder="Enter your first name"
                    name="first_name"
                    value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Last Name
                </label>

                <input
                    type="text"
                    class="form-control @error('last_name') is-invalid @enderror"
                    id="name"
                    placeholder="Enter your last name"
                    name="last_name"
                    value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

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
                <label for="password" class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Create a password"
                    name="password">
                @error('password')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="confirm-password" class="form-label">
                    Confirm Password
                </label>

                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="confirm-password"
                    placeholder="Confirm your password"
                    name="password_confirmation">
                @error('password')
                    <div class="text-left">
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn register-btn w-100" >Create Account</button>

        </form>

        <div class="text-center mt-4">
            <p class="register-subtitle small mb-0">
                Already have an account?
                <a href="{{ route('portal.auth.login') }}" class="register-link">
                    Sign in
                </a>
            </p>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
                const submitBtn = document.querySelector('.register-btn');
                const form = submitBtn.closest('form');

                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to register with the provided information?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, register!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
</script>
    
@endsection

@section('page-styles')

<style>
    .register-page {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background-color: var(--background-color);
    }

    .register-card {
        width: 100%;
        max-width: 480px;
        padding: 40px;
        background-color: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    }

    .register-title {
        color: var(--primary-color);
        font-weight: 700;
    }

    .register-subtitle {
        color: var(--muted-color);
    }

    .register-form label {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .register-form .form-control {
        padding: 12px 14px;
        border: 1px solid var(--border-color);
        border-radius: 7px;
    }

    .register-form .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(200, 117, 77, 0.12);
    }

    .register-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 7px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .register-btn:hover {
        background-color: var(--accent-color);
        color: white;
    }

    .register-link {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 600;
    }

    .register-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .register-card {
            padding: 28px 22px;
        }
    }
</style>

@endsection