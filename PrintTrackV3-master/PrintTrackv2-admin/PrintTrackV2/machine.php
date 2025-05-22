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
                    <h1 class="h3 mb-2 text-gray-800">Machines</h1>

                    <!-- Button for Create Plate Modal -->
                    <div class="btn-group mb-2">
                            <button type="button" class="btn btn-lg btn-primary ml-2" id="createmachine" data-bs-toggle="modal" data-bs-target="#addMachineModal">Load Job</button>
                        </div>

                    <!-- Modal for Adding Machines -->
                    <div class="modal fade" id="addMachineModal" tabindex="-1" aria-labelledby="addMachineModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Add Machine</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="machineForm">
                                    <div class="mb-3">
                                        <label for="machineName" class="form-label">Machine Name</label>
                                        <select class="form-control" id="machineName" required>
                                            <option value="">Select Machine</option>
                                            <option value="CX1">CX1</option>
                                            <option value="CX2">CX2</option>
                                            <option value="CDA">CDA</option>
                                            <option value="CDB">CDB</option>
                                            <option value="CD">CD</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobTicket" class="form-label">Job Ticket Number</label>
                                        <select class="form-control" id="jobTicket" required>
                                            <option value="">Select Job Ticket</option>
                                            <!-- These options should be dynamically loaded from the DB -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobName" class="form-label">Job Name</label>
                                        <input type="text" class="form-control" id="jobName" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rclCode" class="form-label">RCL Code</label>
                                        <input type="text" class="form-control" id="rclCode" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="impression" class="form-label">Impression</label>
                                        <input type="text" class="form-control" id="impression" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="plant" class="form-label">Plant</label>
                                        <select class="form-control" id="plant" required>
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
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" required>
                                            <option value="Running">Running</option>
                                            <option value="Idle">Idle</option>
                                            <option value="Not working">Not working</option>
                                        </select>
                                    </div>
                                    <!-- Add hidden input for machine ID -->
                                    <input type="hidden" id="machineId">
                                    <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                                    <button type="button" class="btn btn-success d-none" id="updateButton">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Machine Info Modal -->
                <div class="modal fade" id="machineInfoModal" tabindex="-1" aria-labelledby="machineInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="machineInfoModalLabel">Machine Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr><th>Machine Name</th><td id="jmachine_name"></td></tr>
                                        <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                        <tr><th>Job Name</th><td id="job_name"></td></tr>
                                        <tr><th>RCL Code</th><td id="rcl_code"></td></tr>
                                        <tr><th>Machine Status</th><td id="machine_status"></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Edit Machines -->
                    <div class="modal fade" id="editMachineModal" tabindex="-1" aria-labelledby="editMachineModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">edit Machine</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="machineForm">
                                    <div class="mb-3">
                                        <label for="machineName" class="form-label">Machine Name</label>
                                        <select class="form-control" id="machineName" required>
                                            <option value="">Select Machine</option>
                                            <option value="CX1">CX1</option>
                                            <option value="CX2">CX2</option>
                                            <option value="CDA">CDA</option>
                                            <option value="CDB">CDB</option>
                                            <option value="CD">CD</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobTicket" class="form-label">Job Ticket Number</label>
                                        <input type="text" class="form-control" id="jobTicket" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobName" class="form-label">Job Name</label>
                                        <input type="text" class="form-control" id="jobName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rclCode" class="form-label">RCL Code</label>
                                        <input type="text" class="form-control" id="rclCode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="impression" class="form-label">Impression</label>
                                        <input type="text" class="form-control" id="impression" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="plant" class="form-label">Plant</label>
                                        <select class="form-control" id="plant" required>
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
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" required>
                                            <option value="Running">Running</option>
                                            <option value="Idle">Idle</option>
                                            <option value="Not working">Not working</option>
                                        </select>
                                    </div>
                                    <!-- Add hidden input for machine ID -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Job</button>
                                </form>
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
                                <!-- Dropdown Filter for Machine -->
                                <div class="mb-3">
                                    <label for="machineFilter" class="form-label font-weight-bold">Filter by Machine:</label>
                                    <select id="machineFilter" class="form-control w-auto d-inline-block ml-2">
                                        <option value="">All</option>
                                        <?php
                                        include 'db_connect.php'; // or your connection file

                                        $query = "SELECT DISTINCT machine_name FROM machines ORDER BY machine_name ASC";
                                        $result = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . htmlspecialchars($row['machine_name']) . "'>" . htmlspecialchars($row['machine_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Machine</th>
                                                <th>Job Ticket Number</th>
                                                <th>Job Name</th>
                                                <th>Plant</th>
                                                <th>Impression</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link active" href="machine.php" style="color: #005700; font-weight: bold;">Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="machineinfo.php" style="color: #8B0000;">Machine Info</a>
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

                                    $sql = "SELECT * FROM machines";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['machine_name'] . "</td>";
                                            echo "<td>" . $row['job_ticket_number'] . "</td>";
                                            echo "<td>" . $row['job_name'] . "</td>";
                                            echo "<td>" . $row['plant'] . "</td>";
                                            echo "<td>" . $row['impression'] . "</td>";
                                            echo "<td>" . $row['machine_status'] . "</td>";
                                            echo "<td>
                                                <button class='btn btn-info btn-sm viewMachineInfo' data-id='" . $row['job_ticket_number'] . "'>Info</button>
                                                <button class='btn btn-warning btn-sm editMachineBtn' data-id='" . $row['job_ticket_number'] . "'>Edit</button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No Machine found.</td></tr>";
                                }
                                $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <!-- /.container-fluid -->


            <!-- Script for Auto-Populate -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Fetch job ticket options (on page load)
                        fetch('get_job_tickets.php')
                            .then(res => res.json())
                            .then(data => {
                                const jobTicketSelect = document.getElementById('jobTicket');
                                data.forEach(ticket => {
                                    const option = document.createElement('option');
                                    option.value = ticket.job_ticket_number;
                                    option.text = ticket.job_ticket_number;
                                    jobTicketSelect.add(option);
                                });
                            });

                        // Fetch job details on selection
                        document.getElementById('jobTicket').addEventListener('change', function () {
                            const ticketNumber = this.value;
                            if (!ticketNumber) return;

                            fetch('get_job_detail.php?ticket=' + ticketNumber)
                                .then(res => res.json())
                                .then(data => {
                                    document.getElementById('jobName').value = data.job_name || '';
                                    document.getElementById('rclCode').value = data.rcl_code || '';
                                    document.getElementById('impression').value = data.impression || '';
                                });
                        });
                    });
                    </script>

            <!-- Script for Machine Modal -->
            <script>
                document.getElementById("machineForm").addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData();
                formData.append("machineName", document.getElementById("machineName").value);
                formData.append("jobTicket", document.getElementById("jobTicket").value);
                formData.append("jobName", document.getElementById("jobName").value);
                formData.append("rclCode", document.getElementById("rclCode").value);
                formData.append("impression", document.getElementById("impression").value);
                formData.append("plant", document.getElementById("plant").value);
                formData.append("status", document.getElementById("status").value);

                fetch("insert_machine.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    alert(result);
                    // Optional: close modal and refresh the table
                    document.getElementById("machineForm").reset();
                    const modal = bootstrap.Modal.getInstance(document.getElementById("addMachineModal"));
                    modal.hide();
                    location.reload(); // Refresh to show the updated table
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            });
            </script>

            <!-- Script for Info Machine Modal -->
            <script>
                $(document).ready(function () {
                    // Handle Info button click
                    $(document).on('click', '.viewMachineInfo', function () {
                        var jobTicketNumber = $(this).data('id');

                        // AJAX request to fetch machine details
                        $.ajax({
                            url: 'get_machine_info.php',
                            type: 'POST',
                            data: { job_ticket_number: jobTicketNumber },
                            dataType: 'json',
                            success: function (response) {
                                if (response.status === 'success') {
                                    $('#jmachine_name').text(response.data.machine_name);
                                    $('#job_ticket_number').text(response.data.job_ticket_number);
                                    $('#job_name').text(response.data.job_name);
                                    $('#rcl_code').text(response.data.rcl_code);
                                    $('#impression').text(response.data.impression);
                                    $('#plant').text(response.data.plant);
                                    $('#machine_status').text(response.data.machine_status);
                                    $('#machineInfoModal').modal('show');
                                } else {
                                    alert('Machine info not found.');
                                }
                            },
                            error: function () {
                                alert('Error fetching machine info.');
                            }
                        });
                    });
                });
                </script>
            
            <!-- Script for Edit Machine Modal -->
            <script>
            $(document).ready(function () {
                // Trigger Edit modal with data
                $(document).on('click', '.editMachineBtn', function () {
                    const jobTicketNumber = $(this).data('id');

                    $.ajax({
                        url: 'get_machine_info.php',
                        type: 'POST',
                        data: { job_ticket_number: jobTicketNumber },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                const data = response.data;

                                $('#editMachineModal #machineName').val(data.machine_name).prop('disabled', true);
                                $('#editMachineModal #jobTicket').val(data.job_ticket_number).prop('readonly', true);
                                $('#editMachineModal #jobName').val(data.job_name).prop('readonly', true);
                                $('#editMachineModal #rclCode').val(data.rcl_code).prop('readonly', true);
                                $('#editMachineModal #impression').val(data.impression).prop('readonly', true);
                                $('#editMachineModal #plant').val(data.plant).prop('disabled', true);
                                $('#editMachineModal #status').val(data.machine_status);

                                $('#editMachineModal').modal('show');
                            } else {
                                alert('Machine data not found.');
                            }
                        },
                        error: function () {
                            alert('Error retrieving machine data.');
                        }
                    });
                });

                // Submit form to update only the status
                $('#editMachineModal #machineForm').on('submit', function (e) {
                    e.preventDefault();
                    const jobTicketNumber = $('#editMachineModal #jobTicket').val();
                    const updatedStatus = $('#editMachineModal #status').val();

                    $.ajax({
                        url: 'update_machine_status.php',
                        type: 'POST',
                        data: {
                            job_ticket_number: jobTicketNumber,
                            machine_status: updatedStatus
                        },
                        success: function (res) {
                            alert('Status updated successfully!');
                            $('#editMachineModal').modal('hide');
                            location.reload(); // Optional: reload to reflect changes in DataTable
                        },
                        error: function () {
                            alert('Error updating status.');
                        }
                    });
                });
            });
            </script>

            <!-- Script for Machine Filter -->
            <script>
            $(document).ready(function() {
                var table = $('#dataTable').DataTable();

                // Custom filter for machine
                $('#machineFilter').on('change', function () {
                    var selected = $(this).val();
                    if (selected) {
                        table.column(0).search('^' + selected + '$', true, false).draw(); // column index 0 = Machine
                    } else {
                        table.column(0).search('').draw();
                    }
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