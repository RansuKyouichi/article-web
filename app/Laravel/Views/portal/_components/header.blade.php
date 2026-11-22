@php
    $user = auth()->user();
    $fullName = $user
        ? $user->first_name . ' ' . $user->last_name
        : 'User';
@endphp

<header class="portal-header">

    <div class="header-left">

        <button class="btn sidebar-toggle d-lg-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#portalSidebar"
                aria-controls="portalSidebar"
                aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <div class="header-heading">
            <h5 class="header-title mb-0">
                {{ $page_title ?? 'Dashboard' }}
            </h5>

            <small class="header-subtitle">
                Welcome to your AMS workspace.
            </small>
        </div>

    </div>

    <div class="header-right">

        <button class="header-icon-btn"
                type="button"
                aria-label="Notifications">
            <i class="bi bi-bell"></i>
            <span class="notification-dot"></span>
        </button>

        <div class="header-profile">

            <div class="profile-avatar">
                {{ $user ? strtoupper(substr($user->first_name, 0, 1)) : 'G' }}
            </div>

            <div class="profile-details d-none d-sm-block">
                <p class="profile-name">{{ $fullName }}</p>
                <small>{{ $user?->email ?? 'User' }}</small>
            </div>

        </div>

    </div>

</header>
