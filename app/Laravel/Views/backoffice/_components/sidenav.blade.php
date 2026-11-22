@php
    $admin = auth('admin')->user();
    $fullName = $admin
        ? $admin->first_name . ' ' . $admin->last_name
        : 'Administrator';
@endphp

<aside class="portal-sidebar offcanvas-lg offcanvas-start"
       tabindex="-1"
       id="portalSidebar"
       aria-labelledby="portalSidebarLabel">

    <div class="offcanvas-header sidebar-mobile-header">
        <a href="{{ route('backoffice.dashboard') }}" class="sidebar-logo">
            <div>
                <h5>AMS<span>.</span></h5>
                <small>ADMIN PORTAL</small>
            </div>
        </a>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                data-bs-target="#portalSidebar"
                aria-label="Close">
        </button>
    </div>

    <div class="sidebar-inner">

        <div class="sidebar-brand">
            <a href="{{ route('backoffice.dashboard') }}" class="sidebar-logo">
                <div>
                    <h5>AMS<span>.</span></h5>
                    <small>ADMIN PORTAL</small>
                </div>
            </a>
        </div>

        <nav class="sidebar-navigation">

            <div class="sidebar-group">
                <p class="sidebar-label">MAIN MENU</p>

                <a href="{{ route('backoffice.dashboard') }}" class="sidebar-link {{ request()->routeIs('backoffice.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="sidebar-group">
                <p class="sidebar-label">USER MANAGEMENT</p>

                <a href="{{ route('backoffice.users.lists') }}" class="sidebar-link {{ request()->routeIs('backoffice.users.lists') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i>
                    <span>User Accounts</span>
                </a>

                <a href="{{ route('backoffice.admins.lists') }}" class="sidebar-link {{ request()->routeIs('backoffice.admins.lists') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Admin Accounts</span>
                </a>
            </div>

            <div class="sidebar-group">
                <p class="sidebar-label">ACCOUNT</p>

                <a href="{{ route('backoffice.profile.details') }}" class="sidebar-link {{ request()->routeIs('backoffice.profile.details') ? 'active' : '' }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </div>

        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">

            <div class="sidebar-user-avatar">
                <i class="bi bi-person"></i>
            </div>

            <div class="sidebar-user-info">
                <p>{{ $fullName }}</p>
                <small>{{ $admin?->email ?? 'Administrator' }}</small>
            </div>

            <form action="{{ route('backoffice.logout') }}" method="POST"  class="js-logout-form">
                @csrf

                <button type="submit" class="sidebar-link logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>

</aside>
