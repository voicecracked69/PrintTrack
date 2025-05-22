<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports</title>

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

<!-- Add this CSS in your <style> tag or CSS file -->
<style>
  @media (min-width: 768px) {
    .modal-custom-size {
      max-width: 900px;
    }
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
                    <h1 class="h1 ml-2 text-gray-800">Hourly Reports</h1>
     
                    
                        


                    <!-- Report Info Modal -->
                    <div class="modal fade" id="reportInfoModal" tabindex="-1" aria-labelledby="reportInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportInfoModalLabel">Hourly Report Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                        <tr><th>Job Name</th><td id="job_name"></td></tr>
                                        <tr><th>RCL Code</th><td id="rcl_code"></td></tr>
                                        <tr><th>Impression</th><td id="impression"></td></tr>
                                        <tr><th>Machine</th><td id="machine"></td></tr>
                                        <tr><th>Status</th><td id="status"></td></tr>
                                    </table>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-secondary">Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                     <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of Report</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Job Ticket Number</th>
                                                <th>Job Name</th>
                                                <th>RCL Code</th>
                                                <th>Impression</th>
                                                <th>Status</th>
                                                <th>Monitor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link" href="report.php" style="color: #005700;">Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="hourlyreport.php" style="color: #8B0000;">Hourly Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link active" href="done_report.php" style="color:rgb(0, 130, 139); font-weight: bold;">Done Reports</a>
                                                </li>
                                                <!-- li class="nav-item">
                                                <a class="nav-link" href="archivedproperty.php " style="color: #808080">
                                                    <i class="fas fa-trash"></i> Archived
                                                </a>
                                                </li -->
                                        </ul>
                                        <tbody>
                                        <?php
                                    // Include database connection
                                    $conn = new mysqli("localhost", "root", "", "printtrack");

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT * FROM reports";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['job_ticket_number'] . "</td>";
                                            echo "<td>" . $row['job_name'] . "</td>";
                                            echo "<td>" . $row['rcl_code'] . "</td>";
                                            echo "<td>" . $row['impression'] . "</td>";
                                            echo "<td>" . $row['impression'] . "</td>";
                                            echo "<td>
                                                <button class='btn btn-info btn-sm openHourlyReportModal' data-id='" . $row['job_ticket_number'] . "'>Update</button>
                                            </td>";
                                            echo "<td>
                                                <button class='btn btn-info btn-sm viewReportInfo' data-id='" . $row['job_ticket_number'] . "'>Info</button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No reports found.</td></tr>";
                                }
                                $conn->close();
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <!-- /.container-fluid -->

            <!-- Script to Open Modal -->
            <script>
                $(document).ready(function () {
                $('.openHourlyReportModal').on('click', function () {
                    const jobId = $(this).data('id');
                    $('#job_ticket_number').val(jobId); // Store job ID in hidden input
                    $('#hourlyReportModal').modal('show'); // Show the modal
                });
                });
            </script>

            <!-- Script for Job Progress -->
            <script>
            document.addEventListener('DOMContentLoaded', () => {
                const statusInputs = document.querySelectorAll('select[name^="status_"]');
                const progressBar = document.getElementById('jobProgressBar');

                function updateProgress() {
                    let runningCount = 0;
                    let totalBlocks = statusInputs.length;

                    statusInputs.forEach(select => {
                        if (select.value === "Running") {
                            runningCount++;
                        }
                    });

                    const percentage = Math.round((runningCount / totalBlocks) * 100);
                    progressBar.style.width = percentage + '%';
                    progressBar.textContent = percentage + '%';

                    // Change bar color based on percentage
                    progressBar.classList.remove('bg-success', 'bg-warning', 'bg-danger');
                    if (percentage > 70) {
                        progressBar.classList.add('bg-success');
                    } else if (percentage > 30) {
                        progressBar.classList.add('bg-warning');
                    } else {
                        progressBar.classList.add('bg-danger');
                    }
                }

                statusInputs.forEach(select => {
                    select.addEventListener('change', updateProgress);
                });

                updateProgress(); // Initialize on load
            });
            </script>

            
            <!-- Script for Automatic Date -->
            <script>
                // Set today's date on page load
                document.addEventListener('DOMContentLoaded', function () {
                    const jobDateInput = document.getElementById('jobDate');
                    const today = new Date().toISOString().split('T')[0]; // Format: YYYY-MM-DD
                    jobDateInput.value = today;
                });
            </script>

            <!-- Script for Fetching Machine and Job Ticket Number -->
            <script>
            // Fetch Job Ticket Numbers based on the selected machine
            $(document).ready(function () {
                $('#machine').change(function () {
                    var machine = $(this).val();

                    $('#job_ticket_number').html('<option value="">Select Job Ticket</option>');

                    if (machine) {
                        $.ajax({
                            url: 'fetch_job_ticket.php',
                            method: 'POST',
                            data: { machine: machine },
                            success: function(response) {
                                var data = JSON.parse(response);
                                if (data.length > 0) {
                                    $.each(data, function(index, item) {
                                        $('#job_ticket_number').append('<option value="' + item.job_ticket_number + '">' + item.job_ticket_number + '</option>');
                                    });
                                } else {
                                    $('#job_ticket_number').append('<option value="">No job tickets available</option>');
                                }
                            }
                        });
                    }
                });

                $('#job_ticket_number').change(function () {
                    var jobTicket = $(this).val();

                    if (jobTicket) {
                        $.ajax({
                            url: 'fetch_job_ticket_details.php',
                            method: 'POST',
                            data: { job_ticket_number: jobTicket },
                            success: function(response) {
                                var data = JSON.parse(response);
                                $('#job_name').val(data.job_name);
                                $('#rcl_code').val(data.rcl_code);
                                $('#impression').val(data.impression);
                            }
                        });
                    }
                });
            });
        </script>

        <!-- Script for Fetching Machine and Job Ticket Number -->
        <script>
            // Submit the form
            $('#reportForm').on('submit', function(e) {
                e.preventDefault();

                // Collect form data
                let formData = $(this).serialize();

                // Send data to PHP for insertion into the database
                $.ajax({
                    url: 'submit_report.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response === 'success') {
                            alert('Report created successfully');
                            $('#addReportModal').modal('hide');
                            // Redirect to report.php after successful submission
                            window.location.href = 'report.php';
                        } else {
                            alert('Error: ' + response);
                        }
                    }
                });
            });
        </script>

        <!-- Script for Report Info Modal -->
        <script>
            $(document).ready(function() {
            // When the "Info" button is clicked
            $('.viewReportInfo').on('click', function() {
                var jobTicketNumber = $(this).data('id'); // Get the job_ticket_number from the button's data-id attribute
                
                // Make sure jobTicketNumber is valid
                if (!jobTicketNumber) {
                    alert('Job ticket number is missing!');
                    return;
                }

                // Make an AJAX request to fetch the report information based on the job_ticket_number
                $.ajax({
                    url: 'fetch_report_info.php',  // PHP file to fetch report info from the database
                    type: 'POST',
                    data: { job_ticket_number: jobTicketNumber },
                    success: function(response) {
                        // Parse the JSON response
                        try {
                            var report = JSON.parse(response);

                            // Check if there is an error message
                            if (report.error) {
                                alert(report.error);
                                return;
                            }

                            // Populate the modal with fetched data
                            $('#machine').text(report.machine);
                            $('#job_ticket_number').text(report.job_ticket_number);
                            $('#job_name').text(report.job_name);
                            $('#rcl_code').text(report.rcl_code);
                            $('#impression').text(report.impression);
                            $('#shift').text(report.shift);
                            $('#line_supervisor').text(report.line_supervisor);
                            $('#operator').text(report.operator);
                            $('#helper').text(report.helper);
                            $('#qa_inspector').text(report.qa_inspector);
                            $('#date').text(report.date);

                            // Show the modal
                            $('#reportInfoModal').modal('show');
                        } catch (e) {
                            alert('Error parsing response: ' + e.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX request failed: ' + error);
                    }
                });
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



    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>