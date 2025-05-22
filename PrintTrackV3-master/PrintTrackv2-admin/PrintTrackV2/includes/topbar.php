
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>




    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <div class="topbar-divider d-none d-sm-block"></div>

                <button class="dropdown-item" onclick="showLogoutModal()">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</button>

</nav>
<!-- Add SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showLogoutModal() {
        Swal.fire({
            title: 'Ready to Leave?',
            text: "Select 'Logout' below if you are ready to end your current session.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#007bff', // Primary button color
            cancelButtonColor: '#6c757d', // Secondary button color
            confirmButtonText: 'Logout',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout.php'; // Redirect to logout
            }
        });
    }
</script>






