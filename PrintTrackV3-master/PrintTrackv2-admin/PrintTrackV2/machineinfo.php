<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Machines</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS and Popper.js (needed for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<style>
    .machine-card {
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }

    .machine-card:hover {
        transform: scale(1.05);
        background-color: #f8f9fa;
    }
</style>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "includes/sidenav.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "includes/topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Machine Info</h1>


                <!-- Machine Info Modal -->
                <div class="modal fade" id="machineInfoModal" tabindex="-1" aria-labelledby="machineInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="machineInfoModalLabel">Machine Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr><th>Machine Model</th>
                                            <td>Heidelberg Speedmaster CX102-7+LX</td>
                                        </tr>
                                        <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                        <tr><th>Job Name</th><td id="job_name"></td></tr>
                                        <tr><th>RCL Code</th><td id="rcl_code"></td></tr>
                                        <tr><th>Machine Status</th><td id="machine_status"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Machine Info Modal -->
                    <div class="modal fade" id="machineInfoModal" tabindex="-1" aria-labelledby="machineInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="machineInfoModalLabel">Machine Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="machineInfoContent">
                            <!-- Machine details will be injected here -->
                        </div>
                        </div>
                    </div>
                    </div>


                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                     <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of Machine</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                        <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link" href="machine.php" style="color: #005700;">Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link active" href="machineinfo.php" style="color: #8B0000; font-weight: bold;">Machine Info</a>
                                                
                                                <div class="container mt-4">
                                                <div class="row g-3">
                                                    <!-- Repeat this block for each machine -->
                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 1">
                                                            <div class="card-body">
                                                                <h5 class="card-title">CX-1</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 2">
                                                            <div class="card-body">
                                                                <h5 class="card-title">CX-2</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 3">
                                                            <div class="card-body">
                                                                <h5 class="card-title">CD-A</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 4">
                                                            <div class="card-body">
                                                                <h5 class="card-title">CD-B</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 5">
                                                            <div class="card-body">
                                                                <h5 class="card-title">CD</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card text-center shadow-sm machine-card" data-machine="Machine 6">
                                                            <div class="card-body">
                                                                <h5 class="card-title">XL</h5>
                                                                <p class="card-text">Click to view details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Add more cards up to Machine 6 -->
                                                </div>
                                            </div>

                                                </li>
                                        </ul>
                                        <tbody>
                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <!-- /.container-fluid -->


            <!-- Script for Info Machine Modal -->
            <script>
            document.querySelectorAll('.machine-card').forEach(card => {
                card.addEventListener('click', () => {
                    const machineName = card.getAttribute('data-machine');

                    // Simulate fetching machine info (or do AJAX here)
                    const machineInfo = {
                        "Machine 1": "Details for Machine 1: CX-1, Model: Heidelberg Speedmaster CX102-7+LX, Plant: D8, Last Service: March 10, 2025",
                        "Machine 2": "Details for Machine 2: CX-2, Model: Heidelberg Speedmaster CX102-7+LX, Plant: D8, Last Service: April 1, 2025",
                        "Machine 3": "Details for Machine 3: CD-A, Model: Heidelberg Speedmaster CD102-5+L, Plant: D2, Last Service: March 10, 2025",
                        "Machine 4": "Details for Machine 4: CD-B, Model: Heidelberg Speedmaster CD102-5+L, Plant: D2, Last Service: April 1, 2025",
                        "Machine 5": "Details for Machine 5: CD, Plant: D1, Last Service: March 10, 2025",
                        "Machine 6": "Details for Machine 6: XL, Plant: D1, Last Service: April 1, 2025",
                        // Add details for Machines 3-6...
                    };

                    document.getElementById('machineInfoModalLabel').textContent = machineName;
                    document.getElementById('machineInfoContent').textContent = machineInfo[machineName] || 'No info available';

                    const modal = new bootstrap.Modal(document.getElementById('machineInfoModal'));
                    modal.show();
                });
            });
        </script>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PrintTrack | Starkson Packaging Inc.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap 5 JS (before closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>