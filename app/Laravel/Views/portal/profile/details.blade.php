@extends('portal._layouts.main')

@section('contents')

@php
    $fullName = trim($user->first_name . ' ' . $user->last_name);
    $initials = strtoupper(
        substr($user->first_name, 0, 1)
    );
@endphp

<div class="container-fluid profile-page">

    <div class="profile-heading">
        <div>
            <span class="profile-eyebrow">ACCOUNT SETTINGS</span>
            <h3>My Profile</h3>
            <p>View and manage your personal account information.</p>
        </div>

        <a href="{{ route('portal.profile.edit') }}" class="profile-primary-btn">
            <i class="bi bi-pencil-square"></i>
            Edit Profile
        </a>
    </div>

    <div class="row g-4">

        <div class="col-lg-4">

            <div class="profile-card profile-summary-card">

                <div class="profile-cover"></div>

                <div class="profile-summary-content">

                    <div class="profile-large-avatar">
                        {{ $initials }}
                    </div>

                    <h4>{{ $fullName }}</h4>
                    <p>{{ $user->email }}</p>

                    <hr>

                    <div class="profile-summary-detail">
                        <i class="bi bi-calendar3"></i>
                        <div>
                            <small>Member Since</small>
                            <strong>
                                {{ $user->created_at?->format('F d, Y') ?? 'Not available' }}
                            </strong>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="profile-card">

                <div class="profile-card-heading">
                    <div>
                        <h5>Personal Information</h5>
                        <p>Your registered account details.</p>
                    </div>

                    <i class="bi bi-person-vcard"></i>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <small>First Name</small>
                            <strong>{{ $user->first_name }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="profile-info-item">
                            <small>Last Name</small>
                            <strong>{{ $user->last_name }}</strong>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="profile-info-item">
                            <small>Email Address</small>
                            <strong>{{ $user->email }}</strong>
                        </div>
                    </div>

                </div>

                <div class="profile-information-note">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Need to change your information? Select Edit Profile
                        to update your account details.
                    </span>
                </div>

                {{-- <div class="profile-card-actions">
                    <a href="{{ route('portal.profile.edit') }}" class="profile-primary-btn">
                        Update Information
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div> --}}

            </div>

        </div>

    </div>

</div>

@endsection

@section('page-styles')
<style>
.profile-page {
    padding: 30px;
}

.profile-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 28px;
}

.profile-eyebrow {
    color: var(--accent-color);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.7px;
}

.profile-heading h3 {
    margin: 6px 0;
    color: var(--primary-color);
    font-weight: 700;
}

.profile-heading p,
.profile-card-heading p {
    margin: 0;
    color: var(--muted-color);
    font-size: 13px;
}

.profile-card {
    height: 100%;
    padding: 25px;
    background: var(--surface-color);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: 0 4px 18px rgba(32, 32, 32, .035);
}

.profile-summary-card {
    padding: 0;
    overflow: hidden;
    text-align: center;
}

.profile-cover {
    height: 105px;
    background: linear-gradient(120deg, #C8754D, #E6AD8F);
}

.profile-summary-content {
    padding: 0 25px 25px;
}

.profile-large-avatar {
    width: 88px;
    height: 88px;
    margin: -44px auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 5px solid white;
    border-radius: 50%;
    background: var(--accent-light);
    color: var(--accent-color);
    font-size: 25px;
    font-weight: 700;
}

.profile-summary-content h4 {
    margin-bottom: 5px;
    font-size: 19px;
    font-weight: 700;
    color: var(--primary-color);
}

.profile-summary-content > p {
    color: var(--muted-color);
    font-size: 13px;
    overflow-wrap: anywhere;
}

.profile-summary-content hr {
    margin: 22px 0;
    border-color: var(--border-color);
}

.profile-summary-detail {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    text-align: left;
}

.profile-summary-detail > i {
    color: var(--accent-color);
    font-size: 19px;
}

.profile-summary-detail small,
.profile-summary-detail strong {
    display: block;
}

.profile-summary-detail small,
.profile-info-item small {
    color: var(--muted-color);
    font-size: 11px;
}

.profile-summary-detail strong {
    margin-top: 3px;
    color: var(--primary-color);
    font-size: 12px;
}

.profile-card-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
}

.profile-card-heading h5 {
    margin-bottom: 5px;
    color: var(--primary-color);
    font-weight: 700;
}

.profile-card-heading > i {
    color: var(--accent-color);
    font-size: 25px;
}

.profile-info-item {
    min-height: 75px;
    padding: 15px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    background: #FDFCFA;
}

.profile-info-item small,
.profile-info-item strong {
    display: block;
}

.profile-info-item strong {
    margin-top: 7px;
    color: var(--primary-color);
    font-size: 14px;
    overflow-wrap: anywhere;
}

.profile-information-note {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-top: 25px;
    padding: 14px;
    border-radius: 8px;
    background: var(--accent-light);
    color: #87543B;
    font-size: 12px;
    line-height: 1.6;
}

.profile-information-note i {
    font-size: 16px;
}

.profile-primary-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 11px 17px;
    border: 1px solid var(--accent-color);
    border-radius: 7px;
    background: var(--accent-color);
    color: white;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s ease;
}

.profile-primary-btn:hover {
    background: var(--accent-hover);
    border-color: var(--accent-hover);
    color: white;
}

@media (max-width: 576px) {
    .profile-page {
        padding: 20px 15px;
    }

    .profile-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .profile-card {
        padding: 20px;
    }
}
</style>
@endsection
