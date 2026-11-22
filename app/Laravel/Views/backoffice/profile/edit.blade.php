
@extends('backoffice._layouts.main')

@section('contents')

@php
    $admin = auth('admin')->user();

    $fullName = trim(
        ($admin->first_name ?? '') . ' ' . ($admin->last_name ?? '')
    );

    $initials = strtoupper(
        substr($admin->first_name ?? 'A', 0, 1)
    );
@endphp

<div class="profile-page">

    <div class="profile-heading">
        <div>
            <span class="profile-eyebrow">ADMINISTRATOR SETTINGS</span>
            <h3>Edit Profile</h3>
            <p>Manage your administrator information and account security.</p>
        </div>

        <a href="{{ route('backoffice.profile.details') }}"
           class="profile-back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Profile
        </a>
    </div>

    <div class="row g-4">

        <div class="col-lg-4">

            <div class="profile-card profile-summary">

                <div class="profile-edit-avatar">
                    {{ $initials }}
                </div>

                <h5>{{ $fullName ?: 'Administrator' }}</h5>

                <p>{{ $admin->email }}</p>

                <span class="profile-role">
                    <i class="bi bi-shield-check me-1"></i>
                    Administrator
                </span>

                <div class="profile-summary-divider"></div>

                <div class="profile-summary-info">
                    <small>Account Created</small>
                    <strong>
                        {{ $admin->created_at?->format('F d, Y') ?? 'Not available' }}
                    </strong>
                </div>

                <div class="profile-summary-info">
                    <small>Account Type</small>
                    <strong>Administrator</strong>
                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <form action="{{ route('backoffice.profile.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="profile-card mb-4">

                    <div class="profile-card-heading">
                        <div>
                            <h5>Personal Information</h5>
                            <p>Update your administrator account details.</p>
                        </div>

                        <i class="bi bi-person-vcard"></i>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="profile-form-label">
                                First Name <span>*</span>
                            </label>

                            <input type="text"
                                   name="first_name"
                                   class="form-control profile-input @error('first_name') is-invalid @enderror"
                                   value="{{ old('first_name', $admin->first_name) }}"
                                   placeholder="Enter first name"
                                   required>

                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="profile-form-label">
                                Last Name <span>*</span>
                            </label>

                            <input type="text"
                                   name="last_name"
                                   class="form-control profile-input @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name', $admin->last_name) }}"
                                   placeholder="Enter last name"
                                   required>

                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="profile-form-label">
                                Email Address <span>*</span>
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control profile-input @error('email') is-invalid @enderror"
                                   value="{{ old('email', $admin->email) }}"
                                   placeholder="Enter email address"
                                   required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="profile-card mb-4">

                    <div class="profile-card-heading">
                        <div>
                            <h5>Security Settings</h5>
                            <p>Change your administrator password if necessary.</p>
                        </div>

                        <i class="bi bi-shield-lock"></i>
                    </div>

                    <div class="profile-information-note mb-4">
                        <i class="bi bi-info-circle"></i>

                        <span>
                            Password changes are optional.
                            Leave both password fields blank if you want
                            to keep your current password.
                        </span>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="profile-form-label">
                                New Password
                            </label>

                            <input type="password"
                                   name="new_password"
                                   class="form-control profile-input @error('new_password') is-invalid @enderror"
                                   placeholder="Enter new password"
                                   autocomplete="new-password">

                            @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="profile-input-help">
                                Minimum of 8 characters.
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="profile-form-label">
                                Confirm New Password
                            </label>

                            <input type="password"
                                   name="new_password_confirmation"
                                   class="form-control profile-input"
                                   placeholder="Confirm new password"
                                   autocomplete="new-password">

                            <small class="profile-input-help">
                                Re-enter your new password.
                            </small>
                        </div>

                    </div>

                </div>

                <div class="profile-form-actions">

                    <a href="{{ route('backoffice.profile.details') }}"
                       class="profile-cancel-btn">
                        Cancel
                    </a>

                    <button type="submit"
                            class="profile-primary-btn">
                        <i class="bi bi-check-lg"></i>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@section('page-styles')
<style>

.profile-page {
    padding: 35px 40px;
    max-width: 1500px;
    margin: 0 auto;
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
    margin: 7px 0;
    color: var(--primary-color);
    font-family: 'Playfair Display', serif;
    font-size: 29px;
    font-weight: 700;
}

.profile-heading p {
    margin: 0;
    color: var(--muted-color);
    font-size: 13px;
}

.profile-card {
    height: 100%;
    padding: 27px;
    background: var(--surface-color);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: 0 4px 18px rgba(32,32,32,.035);
}

.profile-summary {
    text-align: center;
}

.profile-edit-avatar {
    width: 85px;
    height: 85px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 5px auto 18px;
    border-radius: 50%;
    background: var(--accent-light);
    color: var(--accent-color);
    font-size: 27px;
    font-weight: 700;
    border: 4px solid white;
    box-shadow: 0 0 0 1px var(--border-color);
}

.profile-summary h5 {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 5px;
}

.profile-summary > p {
    color: var(--muted-color);
    font-size: 12px;
    overflow-wrap: anywhere;
}

.profile-role {
    display: inline-block;
    padding: 7px 13px;
    border-radius: 30px;
    background: var(--accent-light);
    color: var(--accent-color);
    font-size: 11px;
    font-weight: 700;
}

.profile-summary-divider {
    height: 1px;
    background: var(--border-color);
    margin: 25px 0;
}

.profile-summary-info {
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: left;
    margin-bottom: 20px;
}

.profile-summary-info small {
    color: var(--muted-color);
    font-size: 11px;
}

.profile-summary-info strong {
    color: var(--primary-color);
    font-size: 12px;
}

.profile-card-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 27px;
}

.profile-card-heading h5 {
    margin-bottom: 5px;
    color: var(--primary-color);
    font-size: 15px;
    font-weight: 700;
}

.profile-card-heading p {
    margin: 0;
    color: var(--muted-color);
    font-size: 12px;
}

.profile-card-heading > i {
    color: var(--accent-color);
    font-size: 25px;
}

.profile-form-label {
    display: block;
    margin-bottom: 9px;
    color: var(--primary-color);
    font-size: 12px;
    font-weight: 700;
}

.profile-form-label span {
    color: var(--accent-color);
}

.profile-input {
    min-height: 45px;
    padding: 10px 13px;
    border: 1px solid var(--border-color);
    border-radius: 7px;
    background: #FDFCFA;
    color: var(--text-color);
    font-size: 13px;
}

.profile-input:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(200,117,77,.12);
    background: white;
}

.profile-input-help {
    display: block;
    margin-top: 7px;
    color: var(--muted-color);
    font-size: 11px;
}

.profile-information-note {
    display: flex;
    align-items: flex-start;
    gap: 10px;
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

.profile-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    padding-top: 22px;
    border-top: 1px solid var(--border-color);
}

.profile-back-btn,
.profile-cancel-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 16px;
    border: 1px solid var(--border-color);
    border-radius: 7px;
    background: white;
    color: var(--muted-color);
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s ease;
}

.profile-back-btn:hover,
.profile-cancel-btn:hover {
    border-color: var(--accent-color);
    color: var(--accent-color);
}

.profile-primary-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 11px 19px;
    border: 1px solid var(--accent-color);
    border-radius: 7px;
    background: var(--accent-color);
    color: white;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s ease;
}

.profile-primary-btn:hover {
    background: var(--accent-hover);
    border-color: var(--accent-hover);
}

@media(max-width: 768px) {
    .profile-page {
        padding: 25px 20px;
    }
}

@media(max-width: 576px) {
    .profile-page {
        padding: 20px 14px;
    }

    .profile-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .profile-card {
        padding: 20px;
    }

    .profile-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }   

    .profile-form-actions a,
    .profile-form-actions button {
        width: 100%;
    }
}
</style>
@endsection
