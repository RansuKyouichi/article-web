
@extends('backoffice._layouts.main')

@section('page-styles')
    @include('backoffice._components.management-styles')
@endsection

@section('contents')

<div class="management-page">

    <div class="management-header">
        <div>
            <h3>Admin Management</h3>
            <p>Manage administrator accounts and their information.</p>
        </div>

        {{-- <a href="{{ route('backoffice.admins.create') }}" class="management-btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Create Admin
        </a> --}}
    </div>

    <div class="management-card">
        <div class="management-card-header">
            <h5>Administrator Accounts</h5>
            <span class="management-count">{{ $records->total() }} Admins</span>
        </div>

        <div class="table-responsive">
            <table class="management-table">
                <thead>
                    <tr>
                        <th class="number-column">#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Date Registered</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($records as $index => $record)
                        <tr>
                            <td class="number-column">{{ $records->firstItem() + $index }}</td>
                            <td>{{ $record->first_name }}</td>
                            <td>{{ $record->last_name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                            <td>
                                <div class="management-actions">
                                    <a href="{{ route('backoffice.admins.show', $record->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('backoffice.admins.edit', $record->id) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    @if (auth('admin')->id() != $record->id)
                                        <form action="{{ route('backoffice.admins.delete', $record->id) }}"
                                              method="POST"
                                              class="js-confirm-delete">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="management-empty">
                                    <i class="bi bi-shield-lock"></i>
                                    <h6 class="fw-bold text-dark">No Administrators Found</h6>
                                    <p class="mb-3">There are currently no administrator accounts.</p>
                                    <a href="{{ route('backoffice.admins.create') }}" class="management-btn-primary">
                                        Create First Admin
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($records->hasPages())
            <div class="management-pagination d-flex justify-content-between align-items-center gap-3 flex-wrap">
                <small class="text-muted">
                    Showing {{ $records->firstItem() }} to {{ $records->lastItem() }}
                    of {{ $records->total() }} administrators
                </small>
                {{ $records->links() }}
            </div>
        @endif
    </div>

</div>

@endsection

@section('page-scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.querySelector('.js-confirm-delete');

    if (form) {
        form.addEventListener('submit', function (event) {

            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete this account?',
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

@endsection