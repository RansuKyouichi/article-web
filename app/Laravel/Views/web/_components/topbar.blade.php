<nav class="navbar navbar-expand-lg site-navbar sticky-top">
    <div class="container">

        <a class="navbar-brand site-logo"
           href="{{ route('web.home') }}">
            AMS<span>.</span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.home') ? 'active' : '' }}"
                        @if (request()->routeIs('web.home')) aria-current="page" @endif
                       href="{{ route('web.home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.articles', 'web.article') ? 'active' : '' }}"
                        @if (request()->routeIs('web.articles')) aria-current="page" @endif
                       href="{{ route('web.articles') }}">
                        Articles
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.about') ? 'active' : '' }}"
                        @if (request()->routeIs('web.about')) aria-current="page" @endif
                       href="{{ route('web.about') }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                        @if (request()->routeIs('web.contact')) aria-current="page" @endif
                       href="{{ route('web.contact') }}">
                        Contact
                    </a>
                </li>


                @guest
                    <li class="nav-item">
                        <a href="{{ route('portal.auth.login') }}"
                        class="btn btn-accent nav-cta">
                            Sign Up
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="nav-link">
                            Hello, {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/user') }}"
                        class="btn btn-dark nav-cta">
                            User Portal
                        </a>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>
