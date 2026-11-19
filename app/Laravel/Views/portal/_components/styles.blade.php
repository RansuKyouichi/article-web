
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

* {
    box-sizing: border-box;
}
    
body {
    font-family: 'DM Sans', sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
    min-height: 100vh;
}

a {
    text-decoration: none;
}

.site-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 2rem;
    font-weight: 800;
    letter-spacing: -1px;
}

.site-logo span{
    color: var(--accent-color);
}

.portal-sidebar {
    width: 265px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1045;
    background-color: var(--surface-color);
    border-right: 1px solid var(--border-color);
    overflow: hidden;
}

.sidebar-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 28px 20px 18px;
}

.sidebar-brand {
    padding: 0 10px 35px;
}

.sidebar-logo {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
}

.sidebar-logo h5 {
    font-family: 'Playfair Display', serif;
    font-size: 27px;
    font-weight: 700;
    color: var(--primary-color);
    margin: 0;
    letter-spacing: -1px;
}

.sidebar-logo h5 span {
    color: var(--accent-color);
}

.sidebar-logo small {
    display: block;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 2.2px;
    color: var(--muted-color);
    margin-top: 2px;
}

.sidebar-navigation {
    display: flex;
    flex-direction: column;
    gap: 30px;
    flex: 1;
    overflow-y: auto;
    padding: 0 0 15px;
}

.sidebar-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.sidebar-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.4px;
    color: #A09A91;
    margin: 0 0 9px 12px;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 13px;
    position: relative;
    padding: 11px 13px;
    border-radius: 7px;
    text-decoration: none;
    color: var(--muted-color);
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.sidebar-link i {
    font-size: 17px;
    width: 20px;
    text-align: center;
    transition: color 0.2s ease;
}

.sidebar-link:hover {
    background-color: #FAF5F1;
    color: var(--accent-color);
}

.sidebar-link.active {
    background-color: #F8EDE7;
    color: var(--accent-color);
    font-weight: 700;
}

.sidebar-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 25%;
    height: 50%;
    width: 3px;
    background-color: var(--accent-color);
    border-radius: 0 4px 4px 0;
}

.sidebar-footer {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 17px 8px 5px;
    border-top: 1px solid var(--border-color);
}

.sidebar-user-avatar {
    width: 38px;
    height: 38px;
    min-width: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F8EDE7;
    color: var(--accent-color);
    border-radius: 50%;
    font-size: 19px;
}

.sidebar-user-info {
    flex: 1;
    min-width: 0;
}

.sidebar-user-info p {
    margin: 0;
    color: var(--primary-color);
    font-size: 12px;
    font-weight: 700;
}

.sidebar-user-info small {
    font-size: 11px;
    color: var(--muted-color);
}

.sidebar-user-menu {
    border: none;
    background: transparent;
    padding: 5px;
}

.sidebar-user-menu:hover {
    color: var(--accent-color);
}

.sidebar-mobile-header {
    display: none;
}

.logout-link {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 12px 16px;
    border: none;
    background: transparent;
    color: #dc3545;
    text-align: left;
    cursor: pointer;
    border-radius: 8px;
    transition: background 0.2s ease;
}

.logout-link:hover {
    background: rgba(220, 53, 69, 0.1);
}


.portal-content {
    margin-left: 265px;
    min-height: 100vh;
}

.portal-header {
    width: 100%;
    min-height: 85px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 32px;
    background-color: var(--surface-color);
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: 1020;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.header-heading {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.header-title {
    font-size: 17px;
    font-weight: 700;
    color: var(--primary-color);
    letter-spacing: -0.3px;
}

.header-subtitle {
    font-size: 12px;
    color: var(--muted-color);
}


.sidebar-toggle {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--background-color);
    border: 1px solid var(--border-color);
    border-radius: 7px;
    color: var(--primary-color);
    font-size: 21px;
    transition: all 0.2s ease;
}

.sidebar-toggle:hover {
    background-color: #F8EDE7;
    color: var(--accent-color);
    border-color: #EAD0C2;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 22px;
}

.header-search {
    width: 240px;
    height: 39px;
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 0 12px;
    background-color: var(--background-color);
    border: 1px solid var(--border-color);
    border-radius: 7px;
    color: var(--muted-color);
}

.header-search i {
    font-size: 14px;
}

.header-search .form-control {
    padding: 0;
    border: none;
    background: transparent;
    box-shadow: none;
    font-size: 12px;
    color: var(--text-color);
}

.header-search .form-control::placeholder {
    color: #A09A91;
}


.header-icon-btn {
    width: 39px;
    height: 39px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--border-color);
    border-radius: 7px;
    background-color: var(--surface-color);
    color: var(--muted-color);
    font-size: 17px;
    transition: all 0.2s ease;
}

.header-icon-btn:hover {
    background-color: #F8EDE7;
    color: var(--accent-color);
    border-color: #EAD0C2;
}

.notification-dot {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background-color: var(--accent-color);
    border: 1.5px solid var(--surface-color);
}


.header-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    padding-left: 20px;
    border-left: 1px solid var(--border-color);
}

.profile-avatar {
    width: 38px;
    height: 38px;
    min-width: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #F8EDE7;
    color: var(--accent-color);
    font-size: 14px;
    font-weight: 700;
}

.profile-details {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.profile-name {
    margin: 0;
    font-size: 12px;
    font-weight: 700;
    color: var(--primary-color);
}

.header-profile small {
    font-size: 11px;
    color: var(--muted-color);
}


@media (max-width: 992px) {

    .portal-sidebar {
        width: 280px;
        height: 100vh;
        border-right: 1px solid var(--border-color);
    }

    .sidebar-inner {
        padding-top: 20px;
    }

    .sidebar-brand {
        display: none;
    }

    .sidebar-mobile-header {
        display: flex;
        padding: 22px 25px;
        border-bottom: 1px solid var(--border-color);
        background-color: var(--surface-color);
    }

    .sidebar-mobile-header .sidebar-logo h5 {
        font-size: 24px;
    }

    .portal-content {
        margin-left: 0;
    }

    .portal-header {
        min-height: 75px;
        padding: 13px 22px;
    }

    .header-right {
        gap: 14px;
    }

    .header-profile {
        padding-left: 14px;
    }

}

@media (max-width: 576px) {

    .portal-content {
        padding: 0;
    }

    .portal-header {
        min-height: 68px;
        padding: 12px 16px;
    }

    .header-left {
        gap: 10px;
    }

    .header-title {
        font-size: 15px;
    }

    .header-subtitle {
        display: none;
    }

    .header-right {
        gap: 10px;
    }

    .header-profile {
        padding-left: 10px;
    }

}

</style>