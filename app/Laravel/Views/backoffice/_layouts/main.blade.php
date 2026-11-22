
<!DOCTYPE html>
<html lang="en">
<head>
    @include('backoffice._components.metas')
    @include('backoffice._components.styles')

    @yield('page-styles')
</head>

<body>

    @if(request()->routeIs(
        'backoffice.auth.login',
        'backoffice.auth.register',
        'backoffice.auth.forgotPassword'
    ))

        <main>
            @include('backoffice._components.notifications')
            @yield('contents')
        </main>

    @else

        <div class="admin-page">

            @include('backoffice._components.sidenav')

            <main class="portal-content">

                @include('backoffice._components.header')

                <div class="flex-grow-1">
                    @include('backoffice._components.notifications')
                    @yield('contents')
                </div>

            </main>

        </div>

    @endif

    @include('backoffice._components.scripts')

    @yield('page-scripts')

</body>
</html>
