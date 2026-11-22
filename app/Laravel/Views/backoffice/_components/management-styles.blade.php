
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');

    :root {
        --primary-color: #202020;
        --accent-color: #C8754D;
        --background-color: #FAF9F6;
        --surface-color: #FFFFFF;
        --text-color: #333333;
        --muted-color: #777777;
        --border-color: #EAE7E1;
        --accent-light: #F8EDE7;
        --accent-hover: #B56640;
        --success-color: #478568;
        --success-light: #EAF4EE;
        --warning-color: #B88A48;
        --warning-light: #F8F1E5;
    }

    .management-page {
        padding: 28px 32px;
        background: var(--background-color);
        color: var(--text-color);
        font-family: 'DM Sans', sans-serif;
    }

    .management-header h3 {
        font-family: 'DM Sans', serif;
        color: var(--primary-color);
        font-size: 29px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .management-header p {
        color: var(--muted-color);
        font-size: 14px;
        margin: 0;
    }

    .management-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 25px;
    }

    .management-card,
    .management-form-card {
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(32, 32, 32, .035);
        overflow: hidden;
    }

    .management-form-card {
        padding: 26px;
    }

    .management-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 18px 20px;
        background: var(--surface-color);
        border-bottom: 1px solid var(--border-color);
    }

    .management-card-header h5 {
        margin: 0;
        color: var(--primary-color);
        font-size: 17px;
        font-weight: 700;
    }

    .management-count {
        background: var(--accent-light);
        color: var(--accent-color);
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 12px;
        font-weight: 700;
    }

    .management-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .management-table thead th {
        background: #F7F5F1;
        color: var(--primary-color);
        font-size: 13px;
        font-weight: 700;
        padding: 14px 16px;
        border-bottom: 1px solid var(--border-color);
        white-space: nowrap;
    }

    .management-table tbody td {
        color: var(--text-color);
        font-size: 13px;
        padding: 14px 16px;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .management-table tbody tr:last-child td {
        border-bottom: none;
    }

    .management-table tbody tr:hover {
        background: #FCFAF8;
    }

    .management-table .number-column {
        width: 65px;
        padding-left: 22px;
        color: var(--muted-color);
    }

    .management-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .management-actions form {
        margin: 0;
    }

    .management-actions .btn {
        width: 35px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 5px;
    }

    .management-actions .btn-outline-primary {
        color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .management-actions .btn-outline-primary:hover {
        background: var(--accent-color);
        color: #fff;
    }

    .management-actions .btn-outline-secondary {
        color: var(--primary-color);
        border-color: #D8D3CB;
    }

    .management-actions .btn-outline-secondary:hover {
        background: var(--primary-color);
        color: #fff;
    }

    .management-actions .btn-outline-danger {
        color: #B85B55;
        border-color: #D9A6A1;
    }

    .management-actions .btn-outline-danger:hover {
        background: #B85B55;
        color: #fff;
    }

    .management-btn-primary {
        display: inline-block;
        background: var(--accent-color);
        border: 1px solid var(--accent-color);
        color: #fff;
        padding: 10px 17px;
        border-radius: 5px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
    }

    .management-btn-primary:hover {
        background: var(--accent-hover);
        border-color: var(--accent-hover);
        color: #fff;
    }

    .management-btn-light {
        display: inline-block;
        background: var(--surface-color);
        color: var(--primary-color);
        border: 1px solid var(--border-color);
        padding: 10px 17px;
        border-radius: 5px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s ease;
    }

    .management-btn-light:hover {
        background: var(--accent-light);
        border-color: #EAD0C2;
        color: var(--accent-color);
    }

    .management-form-card label {
        display: block;
        color: var(--primary-color);
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .management-form-card .form-control {
        min-height: 43px;
        background: #fff;
        border: 1px solid var(--border-color);
        border-radius: 5px;
        color: var(--text-color);
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        box-shadow: none;
    }

    .management-form-card .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(200, 117, 77, .12);
    }

    .management-form-card .form-control::placeholder {
        color: #AAA49C;
    }

    .management-form-card .form-text {
        color: var(--muted-color);
        font-size: 11px;
        margin-top: 6px;
    }

    .management-field {
        margin-bottom: 20px;
    }

    .management-section-title {
        color: var(--primary-color);
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 700;
        padding-bottom: 12px;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .management-detail-label {
        color: var(--muted-color);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 7px;
    }

    .management-detail-value {
        color: var(--primary-color);
        font-size: 14px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .management-detail-item {
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .management-detail-item:last-child {
        border-bottom: none;
    }

    .management-empty {
        padding: 48px 20px;
        text-align: center;
        color: var(--muted-color);
    }

    .management-empty i {
        display: block;
        color: var(--accent-color);
        font-size: 38px;
        margin-bottom: 12px;
    }

    .management-empty h6 {
        color: var(--primary-color);
    }

    .management-pagination {
        padding: 16px 20px;
        border-top: 1px solid var(--border-color);
        background: var(--surface-color);
    }

    .management-pagination small {
        color: var(--muted-color);
        font-size: 12px;
    }

    .management-pagination .pagination {
        margin-bottom: 0;
    }

    .management-pagination .page-link {
        color: var(--accent-color);
        border-color: var(--border-color);
        font-size: 12px;
    }

    .management-pagination .page-item.active .page-link {
        background: var(--accent-color);
        border-color: var(--accent-color);
        color: #fff;
    }

    @media (max-width: 767px) {
        .management-page {
            padding: 20px 16px;
        }

        .management-header h3 {
            font-size: 24px;
        }

        .management-form-card {
            padding: 18px;
        }

        .management-pagination {
            align-items: flex-start !important;
            flex-direction: column;
        }
    }
</style>
