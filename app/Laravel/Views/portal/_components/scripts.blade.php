<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    @if(session('notification-msg'))
        const notificationStatus = @json(session('notification-status', 'info'));

        Swal.fire({
            icon: notificationStatus === 'failed' ? 'error' : notificationStatus,
            title: notificationStatus === 'success' ? 'Success!' : 'Authentication',
            text: @json(session('notification-msg')),
            timer: 2500,
            timerProgressBar: true,
            showConfirmButton: false
        });
    @endif

    const logoutForm = document.querySelector('.js-logout-form');

    if (logoutForm) {
        logoutForm.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out of your admin account.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, log out',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    logoutForm.submit();
                }
            });
        });
    }

});
</script>