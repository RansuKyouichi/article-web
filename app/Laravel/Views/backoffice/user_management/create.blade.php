{{-- @extends('backoffice._layouts.main')

@section('page-styles')
    @include('backoffice._components.management-styles')
@endsection

@section('contents')

<div class="management-page">

    <div class="management-header">
        <div>
            <h3>Create User</h3>
            <p>Add a new registered user to your system.</p>
        </div>

        <a href="{{ route('backoffice.users.lists') }}" class="management-btn-light">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Users
        </a>
    </div>

    <div class="management-form-card">

        <form action="{{ route('backoffice.users.store') }}" method="POST" class="js-confirm-submit">
            @csrf

            <div class="management-section-title">Personal Information</div>

            <div class="row">
                <div class="col-md-6">
                    <div class="management-field">
                        <label for="first_name">First Name</label>
                        <input type="text"
                               name="first_name"
                               id="first_name"
                               class="form-control @error('first_name') is-invalid @enderror"
                               value="{{ old('first_name') }}"
                               placeholder="Enter first name">

                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="management-field">
                        <label for="last_name">Last Name</label>
                        <input type="text"
                               name="last_name"
                               id="last_name"
                               class="form-control @error('last_name') is-invalid @enderror"
                               value="{{ old('last_name') }}"
                               placeholder="Enter last name">

                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="management-field">
                <label for="email">Email Address</label>
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Enter email address">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="management-section-title mt-4">Account Security</div>

            <div class="row">
                <div class="col-md-6">
                    <div class="management-field">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="management-field">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Confirm password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="{{ route('backoffice.users.lists') }}" class="management-btn-light">
                    Cancel
                </a>

                <button type="submit" class="management-btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    Create User
                </button>
            </div>

        </form>

    </div>

</div>

@endsection

@section('page-scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('.js-confirm-submit');

    if (form) {
        form.addEventListener('submit', function (event) {

            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to submit these account details?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, proceed',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });
        });
    }

});
</script>

@endsection --}}