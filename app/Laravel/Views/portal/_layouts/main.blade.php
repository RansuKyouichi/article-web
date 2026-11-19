
<!DOCTYPE html>
<html lang="en">
<head>
    @include('portal._components.metas')
    @include('portal._components.styles')

    @yield('page-styles')
</head>

<body>

    @if(request()->routeIs(
        'portal.auth.login',
        'portal.auth.register',
        'portal.auth.forgotPassword'
    ))

        <main>
            @include('portal._components.notifications')
            @yield('contents')
        </main>

    @else

        <div class="user-page">

            @include('portal._components.sidenav')

            <main class="portal-content">

                @include('portal._components.header')

                <div class="flex-grow-1">
                    @include('portal._components.notifications')
                    @yield('contents')
                </div>

            </main>

        </div>

    @endif

    @include('portal._components.scripts')

    @yield('page-scripts')

</body>
</html>
