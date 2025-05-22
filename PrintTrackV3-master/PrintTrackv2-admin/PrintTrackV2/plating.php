<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plates</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Plating</h1>

                    <!-- Button for Create Plate Modal -->
                    <div class="btn-group mb-2">
                            <button type="button" class="btn btn-lg btn-primary ml-2" id="createplate" data-bs-toggle="modal" data-bs-target="#addPlatesModal">Create Plating</button>
                        </div>

                    <!-- Modal for Adding Plates -->
                    <div class="modal fade" id="addPlatesModal" tabindex="-1" aria-labelledby="addPlatesModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPlatesModalLabel">Add Plate</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addPlateForm">
                                    <div class="mb-3">
                                        <label for="jobTicketNumber" class="form-label">Job Ticket Number</label>
                                        <select class="form-control" id="jobTicketNumber" name="jobTicketNumber" required>
                                            <option value="">Select Job Ticket</option>
                                            <!-- Options will be populated via JS -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobName" class="form-label">Job Name</label>
                                        <input type="text" class="form-control" id="jobName" name="jobName" required readonly>
                                    </div>
                                        <div class="mb-3">
                                            <label for="jobDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="jobDate" name="jobDate" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="plateColor" class="form-label">Color</label>
                                            <input type="text" class="form-control form-control-color" id="color" name="color" title="Choose color">
                                        </div>
                                        <div class="mb-3">
                                            <label for="shift" class="form-label">Shift</label>
                                            <select class="form-select" id="shift" name="shift" required>
                                                <option value="">Select Shift</option>
                                                <option value="Day">Day Shift</option>
                                                <option value="Night">Night Shift</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="plant" class="form-label">Plant</label>
                                            <select class="form-select" id="plant" name="plant" required>
                                                <option value="">Select Plant</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D5">D5</option>
                                                <option value="D6">D6</option>
                                                <option value="D7">D7</option>
                                                <option value="D8">D8</option>
                                                <option value="HAMFI">HAMFI</option>
                                                <option value="HASBRO">HASBRO</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Job Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="New JT">New JT</option>
                                                <option value="Proofing">Proofing</option>
                                                <option value="Balance">Balance</option>
                                                <option value="Adjustment">Adjustment</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="plateStatus" class="form-label">Plate Status</label>
                                            <select class="form-control" id="plateStatus" name="plateStatus" required>
                                                <option value="Pending">Pending</option>
                                                <option value="Plate done">Plate done</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Plates Info Modal -->
                    <div class="modal fade" id="plateInfoModal" tabindex="-1" aria-labelledby="plateInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="plateInfoModalLabel">Plates Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                        <tr><th>Job Name</th><td id="job_name"></td></tr>
                                        <tr><th>Date</th><td id="job_date"></td></tr>
                                        <tr><th>Job Status</th><td id="job_status"></td></tr>
                                        <tr><th>Plate Status</th><td id="plate_status"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Job Modal -->
                        <div class="modal fade" id="editPlateModal" tabindex="-1" aria-labelledby="editPlateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPlateModalLabel">Edit Plate</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="editPlateForm">
                                        <div class="modal-body">
                                            <!-- Job Information Form -->
                                            <div class="form-group">
                                                <label for="edit-job-id">Job Ticket Number</label>
                                                <input type="text" class="form-control" id="edit-job-id" name="job_ticket_number" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-job-name">Job Name</label>
                                                <input type="text" class="form-control" id="edit-job-name" name="job_name" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-job-date">Job Date</label>
                                                <input type="text" class="form-control" id="edit-job-date" name="job_date" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="plateColor" class="form-label">Color</label>
                                                <input type="text" class="form-control form-control-color" id="edit-color" name="color" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-shift">Shift</label>
                                                <select class="form-select" id="edit-shift" name="shift" required>
                                                    <option value="">Select Shift</option>
                                                    <option value="Day">Day Shift</option>
                                                    <option value="Night">Night Shift</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-plant">Plant</label>
                                                <select class="form-select" id="edit-plant" name="plant" required>
                                                    <option value="">Select Plant</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="D5">D5</option>
                                                    <option value="D6">D6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="D8">D8</option>
                                                    <option value="HAMFI">HAMFI</option>
                                                    <option value="HASBRO">HASBRO</option>
                                                </select>
                                            </div>

                                            <!-- Job Status Dropdown -->
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Job Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="New JT">New JT</option>
                                                    <option value="Proofing">Proofing</option>
                                                    <option value="Balance">Balance</option>
                                                    <option value="Adjustment">Adjustment</option>
                                                </select>
                                            </div>

                                            <!-- Plate Status Dropdown -->
                                            <div class="mb-3">
                                                <label for="plateStatus" class="form-label">Plate Status</label>
                                                <select class="form-control" id="plateStatus" name="plateStatus" required>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Plate done">Plate done</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Plate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    <!-- Table of DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of Plates</h6>
                        </div>
                        <div class="card-body">
                            <button onclick="exportToExcel()" class="btn btn-success btn-sm mb-4" id="exportBtn">Export as Excel</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Job Ticket Number</th>
                                            <th>Job Name</th>
                                            <th>Plant</th>
                                            <th>Color</th>
                                            <th>Shift</th>
                                            <th>Job Status</th>
                                            <th>Plate Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="platesTableBody">
                                    <?php
                                    $conn = new mysqli("localhost", "root", "", "printtrack");

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT * FROM plates ORDER BY id DESC"; // Adjust 'id' to your actual column
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['job_ticket_number'] . "</td>";
                                            echo "<td>" . $row['job_name'] . "</td>";
                                            echo "<td>" . $row['plant'] . "</td>";
                                            echo "<td>" . $row['color'] . "</td>";
                                            echo "<td>" . $row['shift'] . "</td>";
                                            echo "<td>" . $row['job_status'] . "</td>";
                                            echo "<td>" . $row['plate_status'] . "</td>";
                                            echo "<td>
                                                    <button class='btn btn-info btn-sm viewPlateInfo' data-id='" . $row['job_ticket_number'] . "'>Info</button>
                                                    <button class='btn btn-warning btn-sm editPlateBtn' data-id='" . $row['job_ticket_number'] . "'>Edit</button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No plates found.</td></tr>";
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
                // Get the DataTable instance
                const table = $('#dataTable').DataTable();

                // Get all data, not just current page
                const allData = table.rows({ search: 'applied' }).data();

                // Column headers (excluding 'Action')
                const headers = [
                    'Job Ticket Number',
                    'Job Name',
                    'Plant',
                    'Color',
                    'Shift',
                    'Job Status',
                    'Plate Status'
                ];

                // Convert DataTables data to a 2D array, excluding the "Action" column (last column)
                const rows = [];
                for (let i = 0; i < allData.length; i++) {
                    const row = allData[i];
                    rows.push([
                        row[0], // Job Ticket Number
                        row[1], // Job Name
                        row[2], // Plant
                        row[3], // Color
                        row[4], // Shift
                        row[5], // Job Status
                        row[6]  // Plate Status
                        // row[7] is "Action" and excluded
                    ]);
                }

                // Prepare worksheet and workbook
                const worksheet = XLSX.utils.aoa_to_sheet([headers, ...rows]);
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Plates');

                // Export as Excel
                XLSX.writeFile(workbook, 'plates_table.xlsx');
            }
            </script>



            <!-- Script for Auto-Populate Job Name -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Load job ticket numbers into the dropdown
                    fetch('P_get_job_tickets.php')
                        .then(res => res.json())
                        .then(data => {
                            const select = document.getElementById('jobTicketNumber');
                            data.forEach(job => {
                                const option = document.createElement('option');
                                option.value = job.job_ticket_number;
                                option.text = job.job_ticket_number;
                                select.appendChild(option);
                            });
                        });

                    // On change, fetch corresponding job name
                    document.getElementById('jobTicketNumber').addEventListener('change', function () {
                        const ticket = this.value;
                        if (!ticket) return;

                        fetch('P_get_job_name.php?ticket=' + encodeURIComponent(ticket))
                            .then(res => res.json())
                            .then(data => {
                                document.getElementById('jobName').value = data.job_name || '';
                            });
                    });
                });
                </script>



            <!-- Script for Create Plate Modal : Auto Date & AJAX Form Submission -->
            <script>
                $(document).ready(function () {
                    // Auto-set date to today
                    var today = new Date().toISOString().split('T')[0];
                    $('#jobDate').val(today);

                    // Form submission with AJAX
                    $('#addPlateForm').on('submit', function (e) {
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: 'add_plate.php',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Plate added successfully!');
                            $('#addPlatesModal').modal('hide');
                            window.location.href = 'plating.php';
                        },
                        error: function() {
                            alert('Error adding plate!');
                        }
                    });
                });

                    // Load table data dynamically
                    function loadPlatesTable() {
                        $.ajax({
                            url: 'fetch_plates.php',
                            type: 'GET',
                            success: function (data) {
                                $('#platesTableBody').html(data);
                            },
                            error: function () {
                                alert('Error loading table data!');
                            }
                        });
                    }

                    // Optional: auto-refresh table when page loads
                    // loadPlatesTable();
                });
            </script>

            <!-- Script for Plate Info Modal -->
            <script>
                $(document).on('click', '.viewPlateInfo', function () {
                    var jobTicketNumber = $(this).data('id'); // Get job ticket number

                    // Fetch the plate data via AJAX
                    $.ajax({
                        url: 'get_plate_info.php',
                        type: 'GET',
                        data: { job_ticket_number: jobTicketNumber },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                // Populate modal fields with fetched data
                                $('#job_ticket_number').text(data.job_ticket_number);
                                $('#job_name').text(data.job_name);
                                $('#job_date').text(data.job_date);
                                $('#job_status').text(data.job_status);
                                $('#plate_status').text(data.plate_status);

                                // Show the correct modal
                                $('#plateInfoModal').modal('show');
                            } else {
                                alert('No data found for this job.');
                            }
                        },
                        error: function() {
                            alert('Error fetching plate data.');
                        }
                    });
                });
            </script>


            <!-- Script for Editing/Updating Plate Modal -->
            <script>
            $(document).on('click', '.editPlateBtn', function () {
                var jobTicketNumber = $(this).data('id'); // Get job ticket number

                // Fetch the plate data via AJAX
                $.ajax({
                    url: 'get_plate_info.php',
                    type: 'GET',
                    data: { job_ticket_number: jobTicketNumber },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            // Populate modal fields with fetched data
                            $('#edit-job-id').val(data.job_ticket_number);
                            $('#edit-job-name').val(data.job_name);
                            $('#edit-job-date').val(data.job_date);
                            
                            // Handle color input
                            if ($('#edit-color').is('select')) {
                                // It's a dropdown
                                if ($('#edit-color option[value="' + data.color + '"]').length > 0) {
                                    $('#edit-color').val(data.color);
                                } else {
                                    $('#edit-color').append('<option value="' + data.color + '" selected>' + data.color + '</option>');
                                }
                            } else {
                                // It's a text input
                                $('#edit-color').val(data.color);
                            }

                            $('#edit-shift').val(data.shift);
                            $('#edit-plant').val(data.plant);
                            $('#status').val(data.job_status);
                            $('#plateStatus').val(data.plate_status);

                            // Show the modal
                            $('#editPlateModal').modal('show');
                        } else {
                            alert('No data found for this job.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: ", status, error);
                        alert('Error fetching plate data.');
                    }
                });
            });

            // Submit the edited form data via AJAX
            $('#editPlateForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: 'update_plate.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            alert('Plate updated successfully');
                            $('#editPlateModal').modal('hide');
                            location.reload(); // Refresh the page to reflect the changes
                        } else {
                            alert('Error updating plate. Please try again.');
                            console.error('Server response:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Form submit error: ", status, error);
                        alert('Error submitting form data.');
                    }
                });
            });
            </script>


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