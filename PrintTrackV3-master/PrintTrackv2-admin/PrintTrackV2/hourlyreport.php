<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports</title>

    <!-- Box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                                <th>Machine</th>
                                                <th>Impression</th>
                                                <th>Shift</th>
                                                <th>Total Mileage</th>
                                                <th>Monitor</th>
                                            </tr>
                                        </thead>
                                        <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link" href="report.php" style="color: #005700;">Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link active" href="hourlyreport.php" style="color: #8B0000; font-weight: bold;">Hourly Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="report_overview.php" style="color: #808080;">Report Overview</a>
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

                                        $sql = "SELECT * FROM hourly_reports";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td class='job_ticket_number'>" . $row['job_ticket_number'] . "</td>";
                                                echo "<td class='job_name'>" . $row['job_name'] . "</td>";
                                                echo "<td class='machine'>" . $row['machine'] . "</td>";
                                                echo "<td class='impression'>" . $row['impression'] . "</td>";
                                                echo "<td class='shift'>" . $row['shift'] . "</td>";
                                                echo "<td class='total_output'>" . $row['total_output'] . "</td>"; 
                                                
                                                // Fixed this line:
                                                echo "<td>
                                                <button 
                                                    type='button' 
                                                    class='btn btn-info btn-sm loadHourlyReportBtn' 
                                                    data-bs-toggle='modal' 
                                                    data-bs-target='#hourlyReportModal' 
                                                    data-id='" . $row['id'] . "' 
                                                    data-job-ticket-number='" . $row['job_ticket_number'] . "' 
                                                    data-job-name='" . $row['job_name'] . "' 
                                                    data-machine='" . $row['machine'] . "' 
                                                    data-impression='" . $row['impression'] . "' 
                                                    data-shift='" . $row['shift'] . "'>
                                                    <i class='bx bxs-caret-right-circle'></i>
                                                </button>
                                            </td>";                                             
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No hourly reports found.</td></tr>";
                                        }
                                    
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
                $('.loadHourlyReportBtn').on('click', function () {
                    const jobId = $(this).data('id');
                    $('#job_ticket_number').val(jobId); // Store job ID in hidden input
                    $('#hourlyReportModal').modal('show'); // Show the modal
                });
                });
            </script>


            <!-- Script for Populating the JTN, JB, M, and IMP to Hourly Report Info Modal-->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const reportInfoButtons = document.querySelectorAll('.reportInfoModalBtn');

                reportInfoButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const jobTicketNumber = this.getAttribute('data-job-ticket-number');
                        const jobName = this.getAttribute('data-job-name');
                        const machine = this.getAttribute('data-machine');
                        const impression = this.getAttribute('data-impression');

                        document.getElementById('modalJT').value = jobTicketNumber;
                        document.getElementById('modalJobName').value = jobName;
                        document.getElementById('modalMachine').value = machine;
                        document.getElementById('modalImpression').value = impression;

                        // After setting the values, call Ajax to insert into database
                        insertHourlyReport(jobTicketNumber, jobName, machine, impression);
                    });
                });
            });
            </script>



            <!-- Script Auto-Sum Output 1–12, Fetch Impression, and Update Total Output -->
                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const outputInputs = document.querySelectorAll('input[name^="output_"]');
                    const impressionInput = document.getElementById('impression');
                    const totalOutputField = document.getElementById('total_output');
                    const progressBar = document.getElementById('jobProgressBar');
                    const jobSelect = document.getElementById('job_name'); // Or machineSelect

                    function updateTotalAndProgress() {
                        let totalOutput = 0;
                        const impression = parseInt(impressionInput.value) || 0;

                        outputInputs.forEach(input => {
                            const val = parseInt(input.value);
                            totalOutput += isNaN(val) ? 0 : val;
                            input.classList.toggle('is-invalid', isNaN(val) && input.value !== '');
                        });

                        if (impression > 0 && totalOutput > impression) {
                            totalOutput = impression;
                        }

                        totalOutputField.value = totalOutput;

                        let percentage = impression > 0 ? Math.round((totalOutput / impression) * 100) : 0;
                        percentage = Math.min(percentage, 100);

                        progressBar.style.width = percentage + '%';
                        progressBar.textContent = percentage + '%';

                        progressBar.setAttribute('aria-valuenow', percentage);
                        progressBar.setAttribute('aria-valuemin', 0);
                        progressBar.setAttribute('aria-valuemax', 100);

                        progressBar.classList.remove('bg-success', 'bg-warning', 'bg-danger');
                        if (percentage >= 100) {
                            progressBar.classList.add('bg-success');
                        } else if (percentage >= 50) {
                            progressBar.classList.add('bg-warning');
                        } else {
                            progressBar.classList.add('bg-danger');
                        }
                    }

                    function debounce(fn, delay = 300) {
                        let timeoutId;
                        return (...args) => {
                            clearTimeout(timeoutId);
                            timeoutId = setTimeout(() => fn(...args), delay);
                        };
                    }

                    const debouncedUpdate = debounce(updateTotalAndProgress, 200);

                    outputInputs.forEach(input => {
                        input.addEventListener('input', debouncedUpdate);
                    });

                    if (impressionInput) {
                        impressionInput.addEventListener('input', debouncedUpdate);
                    }

                    // Function to fetch impression based on job or machine selection
                    async function fetchImpression(jobId) {
                        try {
                            const response = await fetch(`get_impression.php?job_id=${jobId}`);
                            const data = await response.json();
                            if (data && data.impression) {
                                impressionInput.value = data.impression;
                                updateTotalAndProgress(); // Recalculate based on new impression
                            }
                        } catch (error) {
                            console.error('Error fetching impression:', error);
                        }
                    }

                    if (jobSelect) {
                        jobSelect.addEventListener('change', () => {
                            const jobId = jobSelect.value;
                            if (jobId) {
                                fetchImpression(jobId);
                            }
                        });
                    }

                    updateTotalAndProgress(); // Initial run
                });
                </script>

            

            <!-- Script for Job Progress 
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
            </script> -->

            
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


                    <!-- Hourly Report Modal -->
                    <div class="modal fade" id="hourlyReportModal" tabindex="-1" aria-labelledby="hourlyReportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content bg-light p-4 rounded">
                            <div class="modal-header">
                            <h5 class="modal-title mx-auto fw-bold" id="hourlyReportModalLabel">HOURLY REPORT</h5>
                            </div>
                            <div class="modal-body">
                            <h6 class="text-center fw-semibold mb-4">Job Progress:</h6>
                            <!-- Job Progress Bar -->
                            <div class="mb-4">
                                <div class="progress mt-2">
                                <div id="jobProgressBar" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
                                </div>
                            </div>
                            <!-- Job Details -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <label class="fw-semibold">Job Ticket No:</label>
                                <input type="text" class="form-control" id="modalJT" name="job_ticket_number" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Job Name:</label>
                                <input type="text" class="form-control" id="modalJobName" name="job_name" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Machine:</label>
                                <input type="text" class="form-control" id="modalMachine" name="machine" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Impression:</label>
                                <input type="text" class="form-control" id="modalImpression" name="impression" readonly>
                                </div>
                                <div class="col-md-3 mt-3">
                                <label class="fw-semibold">Shift:</label>
                                <input type="text" id="modalShift" class="form-control" name="shift" readonly>
                                </div>
                                
                            </div>
                            <!-- Time Blocks -->
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                <!-- Time Blocks 1 to 6 -->
                                <!-- Repeat this block for each time slot -->
                                <div class="mb-3" id="timeBlock1" name=''>
                                    <label class="fw-bold">07:45–08:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_1">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_1" id="output_1" placeholder="Enter output for block 1">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_1" id="remarks_1" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock1')">Save</button>
                                </div>
                                <!-- Repeat similar blocks for timeBlock2 to timeBlock6 -->

                                <div class="mb-3" id="timeBlock2">
                                    <label class="fw-bold">08:45–09:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_2">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_2" id="output_2" placeholder="Enter output for block 2">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_2" id="remarks_2" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock2')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock3">
                                    <label class="fw-bold">09:45–10:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_3">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_3" id="output_3" placeholder="Enter output for block 3">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_3" id="remarks_3" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock3')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock4">
                                    <label class="fw-bold">10:45–11:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_4">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_4" id="output_4" placeholder="Enter output for block 4">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_4" id="remarks_4" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock4')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock5">
                                    <label class="fw-bold">11:45–12:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_5">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_5" id="output_5" placeholder="Enter output for block 5">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_5" id="remarks_5" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock5')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock6">
                                    <label class="fw-bold">12:45–01:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_6">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_6" id="output_6" placeholder="Enter output for block 6">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_6" id="remarks_6" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock6')">Save</button>
                                </div>
                                </div>
                                <!-- Right Column -->
                                <div class="col-md-6">
                                <!-- Time Blocks 7 to 12 -->
                                <!-- Repeat this block for each time slot -->
                                <div class="mb-3" id="timeBlock7">
                                    <label class="fw-bold">01:45–02:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_7">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_7" id="output_7" placeholder="Enter output for block 7">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_7" id="remarks_7" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock7')">Save</button>
                                </div>
                                <!-- Repeat similar blocks for timeBlock8 to timeBlock12 -->

                                <div class="mb-3" id="timeBlock8">
                                    <label class="fw-bold">02:45–03:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_8">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_8" id="output_8" placeholder="Enter output for block 8">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_8" id="remarks_8" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock8')">Save</button>
                                </div>
                                <!-- Repeat similar blocks for timeBlock2 to timeBlock6 -->

                                <div class="mb-3" id="timeBlock9">
                                    <label class="fw-bold">03:45–04:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_9">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_9" id="output_9" placeholder="Enter output for block 9">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_9" id="remarks_9" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock9')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock10">
                                    <label class="fw-bold">04:45–05:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_10">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_10" id="output_10" placeholder="Enter output for block 10">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_10" id="remarks_10" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock10')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock11">
                                    <label class="fw-bold">05:45–06:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_11">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_11" id="output_11" placeholder="Enter output for block 11">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_11" id="remarks_11" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock11')">Save</button>
                                </div>

                                <div class="mb-3" id="timeBlock12">
                                    <label class="fw-bold">06:45–07:45</label>
                                    <div class="d-flex gap-2 mb-1">
                                    <select class="form-select" name="status_12">
                                        <option value="">Select status</option>
                                        <option value="Makeready">Makeready</option>
                                        <option value="Running">Running</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Job Done">Job Done</option>
                                    </select>
                                    <input type="number" class="form-control output-input" name="output_12" id="output_12" placeholder="Enter output for block 12">
                                    </div>
                                    <input type="text" class="form-control" name="remarks_12" id="remarks_12" placeholder="Remarks">
                                    <button type="button" class="btn btn-success mt-2" onclick="saveTimeBlock('timeblock12')">Save</button>
                                </div>
                                </div>
                            </div>
                            <!-- Total Output and General Remarks -->
                            <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="fw-semibold">Total Output:</label>
                                <input type="number" id="total_output" name="total_output" class="form-control" readonly>
                            </div>
                            <script>
                                document.querySelectorAll('.loadHourlyReportBtn').forEach(button => {
                                    button.addEventListener('click', function () {
                                        const id = this.getAttribute('data-id');

                                        fetch('fetch_total_output.php', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded',
                                            },
                                            body: 'id=' + encodeURIComponent(id)
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data); // For debugging
                                            document.getElementById('total_output').value = data.total_output;
                                        })
                                        .catch(error => {
                                            console.error('Fetch error:', error);
                                        });
                                    });
                                });
                                </script>

                                <div class="col-md-6">
                                <label class="fw-semibold">Remarks:</label>
                                <textarea class="form-control" name="general_remarks" rows="2"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                            <input type="hidden" name="shift_done" id="shiftDoneFlag" value="0">
                            <button type="button" class="btn btn-success" onclick="completeShift()">Shift Done</button>
                            </div>
                        </div>
                        </div>
                    </div>
                     <script>
                    $(document).ready(function() {
                    // Handle click on load button
                    $('.loadHourlyReportBtn').click(function() {
                        // Get data attributes from the clicked button
                        const id = $(this).data('id');
                        const jobTicketNumber = $(this).data('job-ticket-number');
                        const jobName = $(this).data('job-name');
                        const machine = $(this).data('machine');
                        const impression = $(this).data('impression');
                        const shift = $(this).data('shift'); // <-- ADDED THIS LINE
                        
                        // Set basic job info in modal
                        $('#modalJT').val(jobTicketNumber);
                        $('#modalJobName').val(jobName);
                        $('#modalMachine').val(machine);
                        $('#modalImpression').val(impression);
                        $('#modalShift').val(shift); // <-- ADDED THIS LINE

                        
                        // Fetch hourly report data via AJAX
                        $.ajax({
                            url: 'fetch_hourly_report.php',
                            type: 'POST',
                            data: { id: id },
                            dataType: 'json',
                            success: function(response) {
                                if(response.status === 'success') {
                                    // Populate all time blocks
                                    for(let i = 1; i <= 12; i++) {
                                        $(`#timeBlock${i} select[name="status_${i}"]`).val(response[`status_${i}`]);
                                        $(`#output_${i}`).val(response[`output_${i}`]);
                                        $(`#remarks_${i}`).val(response[`remarks_${i}`]);
                                    }
                                    
                                    // Update total output
                                    $('#total_output').val(response.total_output);
                                    
                                    // Update general remarks
                                    $('textarea[name="general_remarks"]').val(response.general_remarks);
                                    
                                    // Update progress bar
                                    updateProgressBar();
                                } else {
                                    alert('Error loading hourly report: ' + response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('AJAX Error: ' + error);
                            }
                        });
                    });
                    
                    // Function to update progress bar
                    function updateProgressBar() {
                        let totalOutput = parseInt($('#total_output').val()) || 0;
                        let impression = parseInt($('#modalImpression').val()) || 1;
                        let progress = Math.min(100, Math.round((totalOutput / impression) * 100));
                        
                        $('#jobProgressBar').css('width', progress + '%').text(progress + '%');
                    }
                    
                    // Calculate total when any output changes
                    $('.output-input').on('change', function() {
                        calculateTotalOutput();
                        updateProgressBar();
                    });
                    
                    // Function to calculate total output
                    function calculateTotalOutput() {
                        let total = 0;
                        for(let i = 1; i <= 12; i++) {
                            let output = parseInt($(`#output_${i}`).val()) || 0;
                            total += output;
                        }
                        $('#total_output').val(total);
                    }
                });

                function saveTimeBlock(blockId) {
                    // Extract the block number from the ID (e.g., "timeblock1" -> 1)
                    const blockNum = blockId.replace('timeblock', '');

                    // SweetAlert test trigger
                    Swal.fire({
                        title: 'Data Saved',
                        text: `Saved Data for ${blockId}`,
                        icon: 'info',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    // Get the values from the form
                    const id = $('#modalJT').val();
                    const status = $(`select[name="status_${blockNum}"]`).val();
                    const output = $(`#output_${blockNum}`).val();
                    const remarks = $(`#remarks_${blockNum}`).val();

                    // Validate
                    if (!status) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Missing Status',
                            text: 'Please select a status before saving.'
                        });
                        return;
                    }

                    // Send data via AJAX
                    $.ajax({
                        url: 'update_time_block.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            block_num: blockNum,
                            status: status,
                            output: output,
                            remarks: remarks
                        },
                        success: function(response) {
                            console.log('AJAX response:', response);
                            if (response.status === 'success') {
                                // Update total output
                                calculateTotalOutput();
                                updateProgressBar();

                                $(`#${blockId} button`).html('<i class="fas fa-check"></i> Saved');
                                setTimeout(() => {
                                    $(`#${blockId} button`).html('Save');
                                }, 2000);

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Saved!',
                                    text: 'Time block data was successfully updated.',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Save Failed',
                                    text: response.message || 'An error occurred while saving.'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'AJAX Error',
                                text: error
                            });
                            console.error('AJAX error:', xhr.responseText);
                        }
                    });


                }
                    </script>   

                    <!-- Hourly Report Info Modal -->
                    <div class="modal fade" id="hourlyReportInfoModal" tabindex="-1" aria-labelledby="hourlyReportInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content bg-light p-4 rounded">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto fw-bold" id="hourlyReportInfoModalLabel">HOURLY REPORT INFO</h5>
                        </div>
                        <div class="modal-body">
                            <!-- Job Progress -->
                            <div class="mb-4">
                            <h6 class="text-center fw-semibold mb-2">Job Progress:</h6>
                            <div class="progress">
                                <div id="jobProgressBar" class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                            </div>
                            </div>

                            <!-- Job Details -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <label class="fw-semibold">Job Ticket No:</label>
                                <input type="text" class="form-control" id="modalJT" name="job_ticket_number" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Job Name:</label>
                                <input type="text" class="form-control" id="modalJobName" name="job_name" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Machine:</label>
                                <input type="text" class="form-control" id="modalMachine" name="machine" readonly>
                                </div>
                                <div class="col-md-3">
                                <label class="fw-semibold">Impression:</label>
                                <input type="text" class="form-control" id="modalImpression" name="impression" readonly>
                                </div>
                                <div class="col-md-3 mt-3">
                                <label class="fw-semibold">Shift:</label>
                                <input type="text" id="modalShift" class="form-control" name="shift" readonly>
                                </div>
                            </div>

                            <!-- Hourly Blocks in Two Columns -->
                            <div class="row">
                            <!-- Left Column (Blocks 1–6) -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Time Blocks 1–6</h6>

                                <!-- Time Block 1 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block1" name="block1">
                                <h6 class="fw-semibold mb-2">07:45–08:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 2 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block2" name="block2">
                                <h6 class="fw-semibold mb-2">08:45–09:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 3 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block3" name="block3">
                                <h6 class="fw-semibold mb-2">09:45–10:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 4 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block4" name="block4">
                                <h6 class="fw-semibold mb-2">10:45–11:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>
                                
                                <!-- Time Block 5 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block5" name="block5">
                                <h6 class="fw-semibold mb-2">11:45–12:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 6 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block6" name="block6">
                                <h6 class="fw-semibold mb-2">12:45–01:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Add blocks 3–6 here -->
                            </div>

                            <!-- Right Column (Blocks 7–12) -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Time Blocks 7–12</h6>

                                <!-- Time Block 7 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block7" name="block7">
                                <h6 class="fw-semibold mb-2">01:45–02:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 8 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block8" name="block8">
                                <h6 class="fw-semibold mb-2">02:45–03:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 9 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block9" name="block9">
                                <h6 class="fw-semibold mb-2">03:45–04:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 10 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block10" name="block10">
                                <h6 class="fw-semibold mb-2">04:45–05:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>
                                
                                <!-- Time Block 11 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block11" name="block11">
                                <h6 class="fw-semibold mb-2">05:45–06:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Time Block 12 -->
                                <div class="border p-3 rounded mb-3 bg-white shadow-sm" id="block12" name="block12">
                                <h6 class="fw-semibold mb-2">06:45–07:45</h6>
                                <p><strong>Status:</strong></p>
                                <p><strong>Output:</strong></p>
                                <p><strong>Remarks:</strong></p>
                                </div>

                                <!-- Add blocks 9–12 here -->
                            </div>
                            </div>

                            <!-- Total Output and General Remarks -->
                            <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="fw-semibold">Total Output:</label>
                                <p class="form-control-plaintext" id="infoTotalOutput"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-semibold">General Remarks:</label>
                                <p class="form-control-plaintext" id="infoRemarks"></p>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

        <script>
        document.getElementById("reportInfoModalBtn").addEventListener("click", function () {
            const jtNumber = this.getAttribute("data-jt");

            fetch(`get_hourly_report_info.php?job_ticket_number=${jtNumber}`)
                .then(response => response.json())
                .then(data => {
                    // Fill in job details
                    document.getElementById("modalJT").value = data.job_ticket_number;
                    document.getElementById("modalJobName").value = data.job_name;
                    document.getElementById("modalMachine").value = data.machine;
                    document.getElementById("modalImpression").value = data.impression;
                    document.getElementById("modalShift").value = data.shift;

                    // Fill in block data
                    for (let i = 1; i <= 12; i++) {
                        const block = document.getElementById(`block${i}`);
                        block.innerHTML = `
                            <h6 class="fw-semibold mb-2">${block.querySelector("h6").innerText}</h6>
                            <p><strong>Status:</strong> ${data[`block${i}_status`] || ''}</p>
                            <p><strong>Output:</strong> ${data[`block${i}_output`] || ''}</p>
                            <p><strong>Remarks:</strong> ${data[`block${i}_remarks`] || ''}</p>
                        `;
                    }

                    document.getElementById("infoTotalOutput").textContent = data.total_output || '';
                    document.getElementById("infoRemarks").textContent = data.general_remarks || '';

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('hourlyReportInfoModal'));
                    modal.show();
                })
                .catch(error => console.error('Error:', error));
        });
        </script>


    




</body>

</html>