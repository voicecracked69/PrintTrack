<?php
include 'db_connect.php'; // Adjust as per your actual DB config file
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Approval</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

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
                <div class="container-fluid" >

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" >Approval</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Approval Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Department</th>
                                            <th>Assiged Plant</th>
                                            <th>Bio ID</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link active" href="user_approval.php" style="color: #005700; font-weight: bold;">Approval</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="users.php" style="color: #8B0000;">Users</a>
                                                </li>
                                                <!-- li class="nav-item">
                                                <a class="nav-link" href="archivedproperty.php " style="color: #808080">
                                                    <i class="fas fa-trash"></i> Archived
                                                </a>
                                                </li -->
                                        </ul>
                                    <tbody>
                                    <?php
                                    // Fetch pending users from database
                                    $sql = "SELECT * FROM users WHERE status = 'pending'";
                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td>{$row['email']}</td>
                                            <td>{$row['fullname']}</td>
                                            <td>{$row['department']}</td>
                                            <td>{$row['disney']}</td>
                                            <td>
                                                <form action='approve_user.php' method='POST' class='d-flex align-items-center'>
                                                    <input type='hidden' name='bio_id' value='{$row['bio_id']}'>
                                                    <select name='user_type' class='form-select form-select-sm me-2' required>
                                                        <option value='' disabled selected>Select Role</option>
                                                        <option value='Admin'>Admin</option>
                                                        <option value='Secondary'>Secondary</option>
                                                        <option value='Ework'>Ework</option>
                                                        <option value='Production'>Production</option>
                                                    </select>
                                                    <button type='submit' class='btn btn-success btn-sm'>Approve</button>
                                                </form>
                                            </td>
                                            <td>{$row['status']}</td>
                                            <td>
                                                <a href='reject_user.php?id={$row['bio_id']}' class='btn btn-danger btn-sm'>Reject</a>
                                            </td>
                                        </tr>";
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $('#usersTable').DataTable();
                        });
                    </script>
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer 
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PrintTrack | Starkson Packaging Inc.</span>
                    </div>
                </div>
            </footer> -->
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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>