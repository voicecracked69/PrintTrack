<?php
include 'db_connect.php';

// Initialize associative array to count occurrences
$request_counts = [];

// Fetch all request_type entries
$sql = "SELECT request_type FROM requests WHERE request_type IS NOT NULL AND request_type != ''";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $types = explode(',', $row['request_type']); // Split by comma
        foreach ($types as $type) {
            $type = trim($type); // Clean spaces
            if ($type !== '') {
                if (!isset($request_counts[$type])) {
                    $request_counts[$type] = 0;
                }
                $request_counts[$type]++;
            }
        }
    }
}

// Separate into labels and data arrays
$request_types = array_keys($request_counts);
$request_values = array_values($request_counts);

// Fetch machine statuses
$running = $idle = $notWorking = 0;
$sql_machine_status = "SELECT machine_status, COUNT(*) AS count FROM machines GROUP BY machine_status";
$result_machine_status = $conn->query($sql_machine_status);
if ($result_machine_status && $result_machine_status->num_rows > 0) {
    while ($row = $result_machine_status->fetch_assoc()) {
        switch (strtolower($row['machine_status'])) {
            case 'running': $running = $row['count']; break;
            case 'idle': $idle = $row['count']; break;
            case 'not working': $notWorking = $row['count']; break;
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
            window.onunload=function(){null;}
    </script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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

    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<!-- CSS to make cards hoverable -->
<style>
    .hoverable-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hoverable-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-6 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Logout Modal -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to logout?
                        </div>
                        <div class="modal-footer">
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                    <!-- Total Pending Request Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2 hoverable-card" style="cursor: pointer;" onclick="window.location.href='ework_admin.php'">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Pending Requests
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // Database connection (update with your actual credentials)
                                                $conn = new mysqli("localhost", "root", "", "printtrack");

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                // Query to count pending requests
                                                $sql = "SELECT COUNT(*) AS pending_count FROM requests WHERE status = 'pending'";
                                                $result = $conn->query($sql);

                                                if ($result && $row = $result->fetch_assoc()) {
                                                    echo $row['pending_count'];
                                                } else {
                                                    echo "0";
                                                }

                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Total Jobs Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2 hoverable-card" style="cursor: pointer;" onclick="window.location.href='jobs.php'">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Jobs
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // Database connection (adjust as per your configuration)
                                                $conn = new mysqli("localhost", "root", "", "printtrack");

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                // Query to get the count of total jobs
                                                $sql = "SELECT COUNT(*) AS total_jobs FROM jobs";
                                                $result = $conn->query($sql);

                                                // Fetch the result and display the total jobs
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    echo $row['total_jobs'];
                                                } else {
                                                    echo "0";
                                                }

                                                // Close the connection
                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Total Reports Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2 hoverable-card" style="cursor: pointer;" onclick="window.location.href='report.php'">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Total Reports
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        // Database connection (adjust as per your configuration)
                                                        $conn = new mysqli("localhost", "root", "", "printtrack");

                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        // Query to get the count of total reports
                                                        $sql = "SELECT COUNT(*) AS total_reports FROM reports";
                                                        $result = $conn->query($sql);

                                                        // Fetch the result and display the total reports
                                                        if ($result->num_rows > 0) {
                                                            $row = $result->fetch_assoc();
                                                            echo $row['total_reports'];
                                                        } else {
                                                            echo "0";
                                                        }

                                                        // Close the connection
                                                        $conn->close();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Total Machines Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2 hoverable-card" style="cursor: pointer;" onclick="window.location.href='machine.php'">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total Machines
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // Database connection (adjust as per your configuration)
                                                $conn = new mysqli("localhost", "root", "", "printtrack");

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }

                                                // Query to get the count of total machines
                                                $sql = "SELECT COUNT(*) AS total_machines FROM machines";
                                                $result = $conn->query($sql);

                                                // Fetch the result and display the total machines
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    echo $row['total_machines'];
                                                } else {
                                                    echo "0";
                                                }

                                                // Close the connection
                                                $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Request Type</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myChart" width="550" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Machine Status</h6>
                            </div>
                            <!-- Pie Chart Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Running
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Idle
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> Not Working
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    


                    <!-- Script for Horizontal Bar Chart and Pie Chart -->
                    <script>
                    const requestTypes = <?php echo json_encode($request_types); ?>;
                    const requestCounts = <?php echo json_encode($request_counts); ?>;

                    const backgroundColors = [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(199, 199, 199, 0.6)',
                        'rgba(83, 102, 255, 0.6)',
                        'rgba(255, 99, 71, 0.6)'
                    ];

                    const ctxBar = document.getElementById('myChart').getContext('2d');
                    const myBarChart = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: requestTypes,
                            datasets: [{
                                label: 'Request Types',
                                data: requestCounts,
                                backgroundColor: backgroundColors,
                                borderColor: backgroundColors.map(color => color.replace('0.6', '1')),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                            scales: {
                                x: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                        // Pie Chart (Doughnut)
                        // Retrieve the PHP variables passed to JavaScript
                        const runningCount = <?php echo $running; ?>;
                        const idleCount = <?php echo $idle; ?>;
                        const notWorkingCount = <?php echo $notWorking; ?>;

                        const ctxPie = document.getElementById("myPieChart").getContext('2d');
                        const myPieChart = new Chart(ctxPie, {
                            type: 'doughnut', // You can change to 'pie' if you prefer a simple pie chart
                            data: {
                                labels: ["Running", "Idle", "Not Working"],
                                datasets: [{
                                    data: [runningCount, idleCount, notWorkingCount],
                                    backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b'],
                                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#be2617'],
                                    hoverBorderColor: "rgba(234, 236, 244, 1)"
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                tooltips: {
                                    backgroundColor: "rgb(255,255,255)",
                                    bodyFontColor: "#858796",
                                    borderColor: '#dddfeb',
                                    borderWidth: 1,
                                    xPadding: 15,
                                    yPadding: 15,
                                    displayColors: false,
                                    caretPadding: 10,
                                },
                                legend: {
                                    display: false
                                },
                                cutoutPercentage: 60, // For a doughnut chart effect
                            }
                        });
                    </script>


                    <!--- Script for Pop up Logout Modal --->
                    <script>
                    // Push a dummy state on load
                    window.onload = function () {
                        history.pushState({ page: 1 }, "", "");
                    };

                    // Detect back button
                    window.onpopstate = function (event) {
                        // Show modal instead of navigating
                        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                        logoutModal.show();

                        // Re-push the state so user stays on page
                        history.pushState({ page: 1 }, "", "");
                    };
                    </script>



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example 
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Color System 
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> 

                        <div class="col-lg-6 mb-4"> -->

                            <!-- Illustrations 
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div> -->

                            <!-- Approach 
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div> -->

                </div> 
                <!-- /.container-fluid -->

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Bootstrap 5 JS (before closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>