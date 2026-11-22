@extends('portal._layouts.main')

@section('contents')

@php
    $user = auth()->user();
    $firstName = $user?->first_name ?? 'User';
@endphp

<div class="dashboard-container">

    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-description">
                Manage your account and website content from one place.
            </p>
        </div>

        <span class="small text-muted">
            <i class="bi bi-calendar3 me-2"></i>{{ now()->format('F d, Y') }}
        </span>
    </div>

    <div class="dashboard-welcome-card mb-4">
        <div class="row align-items-center g-3">
            <div class="col">
                <span class="small text-uppercase fw-bold"
                      style="letter-spacing:2px;color:#E5A17F;">
                    USER WORKSPACE
                </span>

                <h2 class="mt-3">
                    Welcome back, {{ $firstName }}!
                </h2>

                <p>
                    Manage your profile and maintain your website content
                    through your personal workspace.
                </p>
            </div>

            <div class="col-auto d-none d-sm-block">
                <div class="welcome-icon">
                    <i class="bi bi-person-workspace"></i>
                </div>
            </div>
        </div>
    </div>

    <h5 class="dashboard-section-title">Quick access</h5>

    <div class="row g-4">

        <div class="col-md-6 col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-icon">
                    <i class="bi bi-person-circle"></i>
                </div>

                <h5>My Profile</h5>

                <p>
                    View your personal information and manage your
                    account details.
                </p>

                <a href="{{ route('portal.profile.details') }}">
                    View profile
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-icon">
                    <i class="bi bi-house-door"></i>
                </div>

                <h5>Home Page</h5>

                <p>
                    Access the homepage section of your content
                    management system.
                </p>

                <a href="{{ route('portal.cms.home') }}">
                    Manage homepage
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <h5>About Page</h5>

                <p>
                    Access the About section of your website.
                </p>

                <a href="{{ route('portal.cms.about') }}">
                    Manage about page
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                <h5>Contact Page</h5>

                <p>
                    Access and manage your website's contact section.
                </p>

                <a href="{{ route('portal.cms.contact') }}">
                    Manage contact page
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <h5>Articles</h5>

                <p>
                    Access the articles section of your content
                    management system.
                </p>

                <a href="{{ route('portal.cms.articles') }}">
                    View articles
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="ams-card mt-4">
        <div class="d-flex align-items-center gap-3">
            <div class="dashboard-card-icon mb-0">
                <i class="bi bi-shield-check"></i>
            </div>

            <div>
                <h6 class="fw-bold mb-1">Account information</h6>
                <p class="text-muted small mb-0">
                    Logged in as {{ $user?->email }}
                </p>
            </div>

            <a href="{{ route('portal.profile.edit') }}"
               class="ams-btn-secondary ms-auto">
                Edit profile
            </a>
        </div>
    </div>

</div>

@endsection

@section('page-styles')

<style>
.dashboard-container,
.page-container {
    width: 100%;
    max-width: 1600px;
    margin: 0 auto;
    padding: 36px 40px !important;
}

.page-heading {
    margin-bottom: 30px;
}

.page-title {
    font-family: 'Playfair Display', serif;
    font-size: 30px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 7px;
}

.page-description {
    color: var(--muted-color);
    font-size: 14px;
    margin: 0;
}

.dashboard-welcome-card {
    background: var(--primary-color);
    color: white;
    border-radius: 14px;
    padding: 32px;
    position: relative;
    overflow: hidden;
}

.dashboard-welcome-card h2 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    margin-bottom: 10px;
}

.dashboard-welcome-card p {
    color: #D0D0D0;
    font-size: 13px;
    margin-bottom: 0;
}

.dashboard-welcome-card .welcome-icon {
    width: 65px;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.10);
    border-radius: 14px;
    font-size: 28px;
    color: #E5A17F;
}

.dashboard-card {
    height: 100%;
    background: var(--surface-color);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 24px;
    transition: transform .2s ease, box-shadow .2s ease;
}

.dashboard-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(32,32,32,.06);
}

.dashboard-card-icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--accent-light);
    color: var(--accent-color);
    border-radius: 10px;
    font-size: 21px;
    margin-bottom: 18px;
}

.dashboard-card h5 {
    color: var(--primary-color);
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 8px;
}

.dashboard-card p {
    color: var(--muted-color);
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 18px;
}

.dashboard-card a {
    color: var(--accent-color);
    font-size: 13px;
    font-weight: 700;
}

.dashboard-card a:hover {
    color: var(--accent-hover);
}

.dashboard-section-title {
    font-size: 15px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 16px;
}

.ams-card {
    background: var(--surface-color);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 24px;
}

.ams-form-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 8px;
}

.ams-form-control {
    width: 100%;
    min-height: 44px;
    border: 1px solid var(--border-color);
    border-radius: 7px;
    padding: 10px 13px;
    background: white;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    color: var(--text-color);
}

.ams-form-control:focus {
    outline: none;
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(200,117,77,.12);
}

.ams-btn-primary {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 11px 19px;
    background: var(--primary-color);
    border: 1px solid var(--primary-color);
    border-radius: 7px;
    color: white;
    font-size: 13px;
    font-weight: 600;
    transition: .2s ease;
}

.ams-btn-primary:hover {
    background: var(--accent-color);
    border-color: var(--accent-color);
    color: white;
}

.ams-btn-secondary {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 11px 19px;
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 7px;
    color: var(--text-color);
    font-size: 13px;
    font-weight: 600;
}

.ams-btn-secondary:hover {
    background: var(--background-color);
    color: var(--primary-color);
}

@media (max-width: 768px) {
    .dashboard-container,
    .page-container {
        padding: 25px 18px !important;
    }

    .page-title {
        font-size: 25px;
    }

    .dashboard-welcome-card {
        padding: 24px;
    }
}

@media (max-width: 576px) {
    .dashboard-container,
    .page-container {
        padding: 20px 14px !important;
    }

    .dashboard-welcome-card h2 {
        font-size: 23px;
    }
}

</style>
    
@endsection