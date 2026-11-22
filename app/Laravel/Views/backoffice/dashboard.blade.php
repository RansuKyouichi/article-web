
@extends('backoffice._layouts.main')

@section('contents')

<div class="dashboard-container p-5">

    <div class="dashboard-header">
        <div>
            <h1 class="bo-page-title">Dashboard</h1>
            <p class="bo-page-description">Manage your portal and keep everything organized.</p>
        </div>

        <div class="dashboard-date">
            <i class="bi bi-calendar3"></i>
            {{ now()->format('F d, Y') }}
        </div>
    </div>

    <div class="dashboard-welcome-card">
        <div class="welcome-content">
            <div class="welcome-label">
                <i class="bi bi-stars"></i>
                ADMINISTRATOR PORTAL
            </div>

            <h2 class="welcome-title">
                Welcome back, {{ auth()->user()->name ?? 'Administrator' }}!
            </h2>

            <p class="welcome-description">
                Welcome to your administration dashboard. Manage administrator
                accounts, monitor registered users, and keep your Article Web
                Portal running smoothly.
            </p>
        </div>

        <i class="bi bi-grid-1x2-fill welcome-icon"></i>
    </div>

        <div class="mb-4">

            <div class="mb-3">
                <h2 class="dashboard-section-title">Management center</h2>
                <p class="dashboard-section-description">
                    Access the main account management sections of your portal.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-12 col-md-6">
                    <a href="{{ route('backoffice.admins.lists') }}"
                    class="dashboard-management-card">

                        <div class="management-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <h3 class="management-title">Admin Management</h3>

                        <p class="management-description">
                            View, create, update, and manage administrator
                            accounts and their access to the backoffice.
                        </p>

                        <div class="management-link">
                            <span>Manage administrators</span>
                            <i class="bi bi-arrow-up-right"></i>
                        </div>

                    </a>
                </div>

                <div class="col-12 col-md-6">
                    <a href="{{ route('backoffice.users.lists') }}"
                    class="dashboard-management-card">

                        <div class="management-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h3 class="management-title">User Management</h3>

                        <p class="management-description">
                            Browse registered users, review their account
                            information, and maintain user records.
                        </p>

                        <div class="management-link">
                            <span>Manage users</span>
                            <i class="bi bi-arrow-up-right"></i>
                        </div>

                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@section('page-styles')


<style>
    .dashboard-container {
        max-width: 1600px;
        margin: 0 auto;
        color: var(--text-color);
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .bo-page-title {
        font-size: 1.8rem;
        font-weight: 750;
        color: var(--primary-color);
        margin-bottom: 6px;
        letter-spacing: -0.7px;
    }

    .bo-page-description {
        color: var(--muted-color);
        font-size: 0.9rem;
        margin: 0;
    }

    .dashboard-date {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 16px;
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        color: var(--muted-color);
        font-size: 0.82rem;
        white-space: nowrap;
    }

    .dashboard-welcome-card {
        position: relative;
        overflow: hidden;
        background: var(--primary-color);
        color: #fff;
        border-radius: 16px;
        padding: 34px;
        margin-bottom: 28px;
        min-height: 185px;
    }

    .dashboard-welcome-card::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 50%;
        right: -60px;
        top: -135px;
    }

    .dashboard-welcome-card::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border: 1px solid rgba(200,117,77,0.35);
        border-radius: 50%;
        right: 75px;
        bottom: -135px;
    }

    .welcome-content {
        position: relative;
        z-index: 1;
        max-width: 650px;
    }

    .welcome-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.72rem;
        font-weight: 650;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: var(--accent-color);
        margin-bottom: 15px;
    }

    .welcome-title {
        font-size: 1.7rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #fff;
    }

    .welcome-description {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
        margin-bottom: 0;
        line-height: 1.7;
    }

    .welcome-icon {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 5rem;
        color: rgba(200,117,77,0.25);
    }

    .dashboard-section-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 5px;
    }

    .dashboard-section-description {
        font-size: 0.82rem;
        color: var(--muted-color);
        margin-bottom: 18px;
    }

    .dashboard-info-card,
    .dashboard-management-card,
    .dashboard-panel {
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 14px;
    }

    .dashboard-info-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        height: 100%;
    }

    .dashboard-info-icon,
    .management-icon,
    .quick-link-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: var(--accent-light);
        color: var(--accent-color);
    }

    .dashboard-info-icon {
        width: 45px;
        height: 45px;
        border-radius: 11px;
        font-size: 1.2rem;
    }

    .dashboard-info-label {
        font-size: 0.76rem;
        color: var(--muted-color);
        margin-bottom: 4px;
    }

    .dashboard-info-value {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .dashboard-management-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 24px;
        text-decoration: none;
        color: inherit;
        transition: all 0.25s ease;
    }

    .dashboard-management-card:hover {
        transform: translateY(-4px);
        border-color: var(--accent-color);
        box-shadow: 0 10px 25px rgba(32,32,32,0.06);
        color: inherit;
    }

    .management-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        font-size: 1.35rem;
        margin-bottom: 19px;
    }

    .management-title {
        font-size: 0.98rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 8px;
    }

    .management-description {
        font-size: 0.81rem;
        color: var(--muted-color);
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .management-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid var(--border-color);
        color: var(--accent-color);
        font-size: 0.8rem;
        font-weight: 650;
    }

 

    @media (max-width: 767px) {
        .dashboard-container {
            padding: 20px !important;
        }

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .dashboard-welcome-card {
            padding: 26px 22px;
        }

        .welcome-title {
            font-size: 1.35rem;
        }

        .welcome-icon {
            right: 15px;
            font-size: 3.5rem;
        }
    }
</style>

    
@endsection
