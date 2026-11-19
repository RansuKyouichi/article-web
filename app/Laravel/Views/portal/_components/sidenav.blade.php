
<aside class="portal-sidebar offcanvas-lg offcanvas-start"
       tabindex="-1"
       id="portalSidebar"
       aria-labelledby="portalSidebarLabel">

    <div class="offcanvas-header sidebar-mobile-header">
        <a href="{{ route('portal.dashboard') }}" class="sidebar-logo">
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
            <a href="{{ route('portal.dashboard') }}" class="sidebar-logo">
                <div>
                    <h5>AMS<span>.</span></h5>
                    <small>ADMIN PORTAL</small>
                </div>
            </a>
        </div>

        <nav class="sidebar-navigation">

            <div class="sidebar-group">
                <p class="sidebar-label">MAIN MENU</p>

                <a href="{{ route('portal.dashboard') }}" class="sidebar-link {{ request()->routeIs('portal.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="sidebar-group">
                <p class="sidebar-label">CONTENT MANAGEMENT</p>

                <a href="{{ route('portal.cms.home') }}" class="sidebar-link {{ request()->routeIs('portal.cms.home') ? 'active' : '' }}">
                    <i class="bi bi-house"></i>
                    <span>Home Page</span>
                </a>

                <a href="{{ route('portal.cms.about') }}" class="sidebar-link {{ request()->routeIs('portal.cms.about') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>About Page</span>
                </a>

                <a href="{{ route('portal.cms.contact') }}" class="sidebar-link {{ request()->routeIs('portal.cms.contact') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact Page</span>
                </a>

                <a href="{{ route('portal.cms.articles') }}" class="sidebar-link {{ request()->routeIs('portal.cms.articles') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Articles</span>
                </a>
            </div>

            <div class="sidebar-group">
                <p class="sidebar-label">ACCOUNT</p>

                <a href="#" class="sidebar-link ">
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
                <p>User</p>
                <small>User</small>
            </div>

            <form action="{{ route('portal.logout') }}" method="POST"  class="js-logout-form">
                @csrf

                <button type="submit" class="sidebar-link logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>

</aside>
