@extends('portal._layouts.main')

@section('contents')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Dashboard</h3>
        <p class="text-muted mb-0">
            Welcome back, "name"!
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <i class="bi bi-person fs-3"
                       style="color: var(--accent-color)"></i>

                    <h5 class="fw-bold mt-3">My Profile</h5>

                    <p class="text-muted">
                        View and update your account information.
                    </p>

                    <a href="{{ route('portal.profile.details') }}">
                        View Profile
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <i class="bi bi-file-earmark-text fs-3"
                       style="color: var(--accent-color)"></i>

                    <h5 class="fw-bold mt-3">Content Management</h5>

                    <p class="text-muted">
                        Access the CMS pages.
                    </p>

                    <a href="{{ route('portal.cms.home') }}">
                        View CMS
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
