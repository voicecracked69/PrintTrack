
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jobs</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS and Popper.js (needed for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- PDFMake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- jsPDF and html2pdf CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>



    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h1 ml-2 text-gray-800">Jobs</h1>
                        
                    <!-- Button for Create Job Modal -->
                    <div class="btn-group mb-2">
                            <button type="button" class="btn btn-lg btn-primary ml-2" id="createjobs" data-toggle="modal" data-target="#createJobModal">Create Jobs</button>
                        </div>
                        
                    <!--Create Job Modal-->
                    <div class="modal fade" id="createJobModal" tabindex="-1" role="dialog" aria-labelledby="createJobModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="createJobModalLabel">Create Job</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Form to submit data to create_job.php -->
                                <form action="create_job.php" method="POST">
                                    <div class="modal-body">
                                        <!-- Form inputs for job creation -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="job-ticket-number" name="job_ticket_number" placeholder="Job ticket number" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="job-name" name="job_name" placeholder="Job name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="customer-name" name="customer_name" placeholder="Customer name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="material" name="material" placeholder="Material" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="rcl-code" name="rcl_code" placeholder="RCL code" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="color" name="color" placeholder="Color" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number-of-colors" name="number_of_colors" placeholder="Number of colors" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="sheet-size" name="sheet_size" placeholder="Sheet size" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="pieces-size" name="pieces_size" placeholder="Pieces size" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="grain-direction" name="grain_direction" placeholder="Grain direction" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="impression" name="impression" placeholder="Impression" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number-of-outs" name="number_of_outs" placeholder="Number of outs" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create Job</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Job Info Modal -->
                    <div class="modal fade" id="jobInfoModal" tabindex="-1" aria-labelledby="jobInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="jobInfoModalLabel">Job Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                        <tr><th>Job Name</th><td id="job_name"></td></tr>
                                        <tr><th>Customer Name</th><td id="customer_name"></td></tr>
                                        <tr><th>RCL Code</th><td id="rcl_code"></td></tr>
                                        <tr><th>Number of Colors</th><td id="number_of_colors"></td></tr>
                                        <tr><th>Sheet Size</th><td id="sheet_size"></td></tr>
                                        <tr><th>Pieces Size</th><td id="pieces_size"></td></tr>
                                        <tr><th>Grain Direction</th><td id="grain_direction"></td></tr>
                                        <tr><th>Number of Outs</th><td id="number_of_outs"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Edit Job Modal -->
                <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="editJobForm">
                                <div class="modal-body">
                                    <!-- Job Information Form -->
                                    <div class="form-group">
                                        <label for="edit-job-id">Job Ticket Number</label>
                                        <input type="text" class="form-control" id="edit-job-id" name="job_ticket_number" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-job-name">Job Name</label>
                                        <input type="text" class="form-control" id="edit-job-name" name="job_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-rcl-code">RCL Code</label>
                                        <input type="text" class="form-control" id="edit-rcl-code" name="rcl_code" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-customer-name">Customer Name</label>
                                        <input type="text" class="form-control" id="edit-customer-name" name="customer_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-material">Material</label>
                                        <input type="text" class="form-control" id="edit-material" name="material" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-color">Color</label>
                                        <input type="text" class="form-control" id="edit-color" name="color" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-impression">Impression</label>
                                        <input type="text" class="form-control" id="edit-impression" name="impression" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-number-of-colors">Number of Colors</label>
                                        <input type="text" class="form-control" id="edit-number-of-colors" name="number_of_colors" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-sheet-size">Sheet Size</label>
                                        <input type="text" class="form-control" id="edit-sheet-size" name="sheet_size" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-pieces-size">Pieces Size</label>
                                        <input type="text" class="form-control" id="edit-pieces-size" name="pieces_size" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-grain-direction">Grain Direction</label>
                                        <input type="text" class="form-control" id="edit-grain-direction" name="grain_direction" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-number-of-outs">Number of Outs</label>
                                        <input type="text" class="form-control" id="edit-number-of-outs" name="number_of_outs" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Job</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                     <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of Jobs</h6>
                            </div>
                            <div class="card-body"> 
                            <button onclick="exportToExcel()" class="btn btn-success btn-sm mb-4" id="exportBtn">Export as Excel</button>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Job Ticket Number</th>
                                                <th>Job Name</th>
                                                <th>Material</th>
                                                <th>RCL Code</th>
                                                <th>Color</th>
                                                <th>Impression</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    // Include database connection
                                    $conn = new mysqli("localhost", "root", "", "printtrack");

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get the latest job entry (assuming 'id' is auto-increment or 'created_at' exists)
                                    $sql = "SELECT * FROM jobs ORDER BY id DESC"; // or ORDER BY created_at DESC LIMIT 1
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['job_ticket_number'] . "</td>";
                                            echo "<td>" . $row['job_name'] . "</td>";
                                            echo "<td>" . $row['material'] . "</td>";
                                            echo "<td>" . $row['rcl_code'] . "</td>";
                                            echo "<td>" . $row['color'] . "</td>";
                                            echo "<td>" . $row['impression'] . "</td>";
                                            echo "<td>
                                                    <button class='btn btn-info btn-sm viewJobInfo' data-id='" . $row['job_ticket_number'] . "'>Info</button>
                                                    <button class='btn btn-warning btn-sm editJobBtn' data-id='" . $row['job_ticket_number'] . "'>Edit</button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No jobs found.</td></tr>";
                                    }
                                    $conn->close();
                                    ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->


            <!-- Script for Export Data -->
            <script>
            function exportToExcel() {
                const table = document.getElementById("dataTable");

                // Clone table to exclude the "Action" column
                const clone = table.cloneNode(true);
                const rows = clone.querySelectorAll("tr");
                rows.forEach(row => row.lastElementChild.remove());

                // Convert table to worksheet
                const worksheet = XLSX.utils.table_to_sheet(clone);
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, "Jobs");

                // Save as Excel file
                XLSX.writeFile(workbook, "jobs_table.xlsx");
            }
            </script>



            

            <!-- Script for Job Info Modal -->
            <script>
                $(document).ready(function () {
                $('.viewJobInfo').on('click', function () {
                    var jobId = $(this).data('id');

                $.ajax({
                url: 'job_info.php',
                type: 'GET',
                data: { id: jobId },
                dataType: 'json',
                success: function (data) {
                    if (data && !data.error) {
                        $('#job_ticket_number').text(data.job_ticket_number);
                        $('#job_name').text(data.job_name);
                        $('#customer_name').text(data.customer_name);
                        $('#material').text(data.material);
                        $('#rcl_code').text(data.rcl_code);
                        $('#color').text(data.color);
                        $('#number_of_colors').text(data.number_of_colors);
                        $('#sheet_size').text(data.sheet_size);
                        $('#pieces_size').text(data.pieces_size);
                        $('#grain_direction').text(data.grain_direction);
                        $('#impression').text(data.impression);
                        $('#number_of_outs').text(data.number_of_outs);
                        $('#jobInfoModal').modal('show');
                    } else {
                        alert(data.error || 'Job not found.');
                    }
                },
                error: function () {
                    alert('Error retrieving job info.');
                }
                    });
                });
            });
            </script>

            <!-- Script for Edit Modal for Jobs -->
            <script>
            // When clicking on the "Edit" button
            $(document).on('click', '.editJobBtn', function() {
                var jobTicketNumber = $(this).data('id');  // Get the job ticket number

                // Fetch job data based on job ticket number
                $.ajax({
                    url: 'get_job_info.php',  // PHP file that fetches the job data
                    method: 'GET',
                    data: { id: jobTicketNumber },
                    dataType: 'json',
                    success: function(data) {
                        if (data && data.job_ticket_number) {
                            // Populate modal fields with job data
                            $('#edit-job-id').val(data.job_ticket_number);
                            $('#edit-job-name').val(data.job_name);
                            $('#edit-customer-name').val(data.customer_name);
                            $('#edit-material').val(data.material);
                            $('#edit-rcl-code').val(data.rcl_code);
                            $('#edit-color').val(data.color);
                            $('#edit-impression').val(data.impression);
                            $('#edit-number-of-colors').val(data.number_of_colors);
                            $('#edit-sheet-size').val(data.sheet_size);
                            $('#edit-pieces-size').val(data.pieces_size);
                            $('#edit-grain-direction').val(data.grain_direction);
                            $('#edit-number-of-outs').val(data.number_of_outs);

                            // Show modal
                            $('#editJobModal').modal('show');
                        } else {
                            alert('Job not found');
                        }
                    },
                    error: function() {
                        alert('Error fetching job details');
                    }
                });
            });

            // Handle form submission to update the job
            $('#editJobForm').on('submit', function(e) {
                e.preventDefault();  // Prevent form from submitting the usual way

                var formData = $(this).serialize();  // Get form data

                $.ajax({
                    url: 'update_job.php',  // PHP file to handle updating the job
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response === 'success') {
                            alert('Job updated successfully');
                            location.reload();  // Reload the page to reflect the changes
                        } else {
                            alert('Error updating job');
                        }
                    },
                    error: function() {
                        alert('Error updating job');
                    }
                });
            });
        </script>

            <!-- jsPDF library -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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