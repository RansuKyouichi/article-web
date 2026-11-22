
@extends('backoffice._layouts.main')

@section('page-styles')
    @include('backoffice._components.management-styles')
@endsection

@section('contents')

<div class="management-page">

    <div class="management-header">
        <div>
            <h3>Admin Details</h3>
            <p>View the admin's account information.</p>
        </div>
    </div>

    <div class="management-form-card">

        <div class="management-section-title">Personal Information</div>

        <div class="row">
            <div class="col-md-6">
                <div class="management-detail-item">
                    <div class="management-detail-label">First Name</div>
                    <div class="management-detail-value">{{ $record->first_name }}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="management-detail-item">
                    <div class="management-detail-label">Last Name</div>
                    <div class="management-detail-value">{{ $record->last_name }}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="management-detail-item">
                    <div class="management-detail-label">Email Address</div>
                    <div class="management-detail-value">{{ $record->email }}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="management-detail-item">
                    <div class="management-detail-label">Date Registered</div>
                    <div class="management-detail-value">
                        {{ $record->created_at?->format('F d, Y h:i A') ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="management-detail-item">
                    <div class="management-detail-label">Last Updated</div>
                    <div class="management-detail-value">
                        {{ $record->updated_at?->format('F d, Y h:i A') ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
            <a href="{{ route('backoffice.admins.lists') }}" class="management-btn-light">
                <i class="bi bi-arrow-left me-1"></i>
                Back to List
            </a>

            <a href="{{ route('backoffice.admins.edit', $record->id) }}" class="management-btn-primary">
                <i class="bi bi-pencil-square me-1"></i>
                Edit Account
            </a>
        </div>

    </div>
</div>

@endsection
