<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save_hourly_report') {
    include 'db_connect.php'; // change to your actual DB file

    $reportId = $_POST['report_id'];
    $timeblocks = $_POST['timeblocks'];
    $isComplete = $_POST['is_complete'];

    // Save as JSON string
    $stmt = $conn->prepare("REPLACE INTO hourly_reports (report_id, timeblocks_json, is_complete) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $reportId, $timeblocks, $isComplete);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo json_encode(['status' => 'success']);
    exit;
}
?>


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

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                    <h1 class="h1 ml-2 text-gray-800">Reports</h1>
                        
                    <!-- Button for Create Job Modal -->
                    <div>
                        <button type="button" class="btn btn-lg btn-primary ml-2 mb-2" id="createreports" data-bs-toggle="modal" data-bs-target="#addReportModal">
                            Create Report
                        </button>
                    </div> 
                        

                    <!-- Modal for Create Report -->
                    <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Report</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="reportForm">
                                        <div class="form-group m-3">
                                            <select id="machine" name="machine" class="form-control">
                                                <option value="">Select Machine</option>
                                                <!-- Options loaded from DB -->
                                                <option value="CX1">CX1</option>
                                                <option value="CX2">CX2</option>
                                                <option value="CDA">CDA</option>
                                                <option value="CDB">CDB</option>
                                                <option value="CD">CD</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-3">
                                            <select id="job_ticket_number" name="job_ticket_number" class="form-control" required>
                                                <option value="">Select Job Ticket</option>
                                                <!-- Job ticket numbers will be dynamically populated based on selected machine -->
                                            </select>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="job_name" name="job_name" class="form-control" placeholder="Job Name" required readonly>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="rcl_code" name="rcl_code" class="form-control" placeholder="RCL Code" required readonly>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="impression" name="impression" class="form-control" placeholder="Impression" required readonly>
                                        </div>
                                        <div class="form-group m-3">
                                            <select id="shift" name="shift" class="form-control" required>
                                                <option value="Day Shift">Day Shift</option>
                                                <option value="Night Shift">Night Shift</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="line_supervisor" name="line_supervisor" placeholder="Line Supervisor" class="form-control">
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="operator" name="operator" class="form-control" placeholder="Operator" required>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="helper" name="helper" class="form-control" placeholder="Helper" required>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="text" id="qa_inspector" name="qa_inspector" class="form-control" placeholder="QA Inspector" required>
                                        </div>
                                        <div class="form-group m-3">
                                            <input type="date" id="jobDate" name="date" class="form-control" placeholder="Date" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Report Info Modal -->
                    <div class="modal fade" id="reportInfoModal" tabindex="-1" aria-labelledby="reportInfoModalLabel" aria-hidden="true">                     
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportInfoModalLabel">Report Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="generate_pdf.php" target="_blank">
                                    <input type="hidden" name="job_ticket_number" id="hidden_jt">
                                    <!-- Your table here -->
                                    <table class="table table-bordered">
                                                    <tr><th>Machine</th><td id="machine"></td></tr>
                                                    <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                                    <tr><th>Job Name</th><td id="job_name"></td></tr>
                                                    <tr><th>RCL Code</th><td id="rcl_code"></td></tr>
                                                    <tr><th>Impression</th><td id="impression"></td></tr>
                                                    <tr><th>Shift</th><td id="shift"></td></tr>
                                                    <tr><th>Line Supervisor</th><td id="line_supervisor"></td></tr>
                                                    <tr><th>Operator</th><td id="operator"></td></tr>
                                                    <tr><th>Helper</th><td id="helper"></td></tr>
                                                    <tr><th>QA Inspector</th><td id="qa_inspector"></td></tr>
                                                    <tr><th>Date</th><td id="date"></td></tr>
                                                </table>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="btn btn-primary">Generate Report</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Success Modal -->
                    <div class="modal fade" id="loadSuccessModal" tabindex="-1" aria-labelledby="loadSuccessLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-success text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loadSuccessLabel">Success</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Hourly report loaded successfully.
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
                                                <th>Machine</th>
                                                <th>RCL Code</th>
                                                <th>Impression</th>
                                                <th>Shift</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <ul class="nav nav-tabs mb-3">
                                                <li class="nav-item ">
                                                <a class="nav-link active" href="report.php" style="color: #005700; font-weight: bold;">Report</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" href="hourlyreport.php" style="color: #8B0000;">Hourly Report</a>
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
                                            $conn = new mysqli("localhost", "root", "", "printtrack");
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM reports";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    $job_ticket_number = $row['job_ticket_number'];

                                                    // Check if this job ticket is already loaded in hourly_report
                                                    $check_sql = "SELECT 1 FROM hourly_reports WHERE job_ticket_number = '$job_ticket_number' LIMIT 1";
                                                    $check_result = $conn->query($check_sql);
                                                    $is_loaded = ($check_result && $check_result->num_rows > 0);

                                                    echo "<tr>";                
                                                    echo "<td><input type='hidden' class='job_ticket_number' value='" . $job_ticket_number . "'>" . $job_ticket_number . "</td>";
                                                    echo "<td><input type='hidden' class='job_name' value='" . $row['job_name'] . "'>" . $row['job_name'] . "</td>";
                                                    echo "<td><input type='hidden' class='machine' value='" . $row['machine'] . "'>" . $row['machine'] . "</td>";
                                                    echo "<td><input type='hidden' class='rcl_code' value='" . $row['rcl_code'] . "'>" . $row['rcl_code'] . "</td>";
                                                    echo "<td><input type='hidden' class='impression' value='" . $row['impression'] . "'>" . $row['impression'] . "</td>";
                                                    echo "<td><input type='hidden' class='shift' value='" . $row['shift'] . "'>" . $row['shift'] . "</td>";
                                                    echo "<td><input type='hidden' class='date' value='" . $row['date'] . "'>" . $row['date'] . "</td>";
                                                    
                                                    echo "<td>";

                                                    // Load Hourly Report Button
                                                    echo "<button 
                                                            type='button' 
                                                            class='btn btn-sm loadHourlyReportBtn " . ($is_loaded ? "btn-success" : "btn-info") . "' 
                                                            " . ($is_loaded ? "disabled style='opacity: 0.6'" : "") . ">
                                                            <i class='bx " . ($is_loaded ? "bx-check" : "bx-right-arrow-alt") . "'></i>
                                                        </button> ";

                                                    // Info Button
                                                    echo "<button 
                                                            type='button'
                                                            class='btn btn-secondary btn-sm reportInfoModal' 
                                                            data-machine='" . htmlspecialchars($row['machine']) . "' 
                                                            data-job_ticket_number='" . htmlspecialchars($job_ticket_number) . "' 
                                                            data-job_name='" . htmlspecialchars($row['job_name']) . "' 
                                                            data-rcl_code='" . htmlspecialchars($row['rcl_code']) . "' 
                                                            data-impression='" . htmlspecialchars($row['impression']) . "' 
                                                            data-shift='" . htmlspecialchars($row['shift']) . "' 
                                                            data-line_supervisor='" . htmlspecialchars($row['line_supervisor']) . "' 
                                                            data-operator='" . htmlspecialchars($row['operator']) . "' 
                                                            data-helper='" . htmlspecialchars($row['helper']) . "' 
                                                            data-qa_inspector='" . htmlspecialchars($row['qa_inspector']) . "' 
                                                            data-date='" . htmlspecialchars($row['date']) . "'>
                                                            <i class='bx bx-info-circle'></i>
                                                        </button>";

                                                    echo "</td>";
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

            <!-- Script for Submitting Hourly Report Modal -->
                <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Save on any input change in the Hourly Report Modal
                    document.querySelectorAll('#hourlyReportModal .timeblock-input').forEach(input => {
                        input.addEventListener('change', function () {
                            const modal = document.getElementById('hourlyReportModal');
                            const reportId = modal.dataset.reportId || generateUniqueId(); // Generate or use existing ID
                            modal.dataset.reportId = reportId; // Persist ID in DOM

                            const timeblocks = {};
                            modal.querySelectorAll('.timeblock-input').forEach(inp => {
                                timeblocks[inp.name] = inp.value;
                            });

                            // Save to backend
                            fetch('report.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: new URLSearchParams({
                                    action: 'save_hourly_report',
                                    report_id: reportId,
                                    timeblocks: JSON.stringify(timeblocks),
                                    is_complete: 0
                                })
                            }).then(res => res.json()).then(data => {
                                if (data.status === 'success') {
                                    console.log('Hourly Report saved');
                                }
                            });
                        });
                    });

                    // When form is submitted completely (e.g., Submit button clicked)
                    const form = document.querySelector('#hourlyReportModal form');
                    form?.addEventListener('submit', function (e) {
                        e.preventDefault();
                        const modal = document.getElementById('hourlyReportModal');
                        const reportId = modal.dataset.reportId;

                        const timeblocks = {};
                        modal.querySelectorAll('.timeblock-input').forEach(inp => {
                            timeblocks[inp.name] = inp.value;
                        });

                        fetch('report.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: new URLSearchParams({
                                action: 'save_hourly_report',
                                report_id: reportId,
                                timeblocks: JSON.stringify(timeblocks),
                                is_complete: 1
                            })
                        }).then(res => res.json()).then(data => {
                            if (data.status === 'success') {
                                alert('Hourly Report submitted successfully');
                                location.reload();
                            }
                        });
                    });

                    function generateUniqueId() {
                        return 'hr_' + Math.random().toString(36).substr(2, 9);
                    }
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

            <!-- Script for Populating the JTN, JB, M, and IMP -->
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const buttons = document.querySelectorAll(".loadHourlyReportBtn");

                    buttons.forEach(button => {
                        button.addEventListener("click", function () {
                            const jt = this.getAttribute("job_ticket_number");
                            const jobName = this.getAttribute("job_name");
                            const machine = this.getAttribute("machine");
                            const impression = this.getAttribute("impression");

                            document.getElementById("modalJT").value = jt;
                            document.getElementById("modalJobName").value = jobName;
                            document.getElementById("modalMachine").value = machine;
                            document.getElementById("modalImpression").value = impression;
                        });
                    });
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
            document.addEventListener('DOMContentLoaded', function () {
                const infoButtons = document.querySelectorAll('.reportInfoModal');

                infoButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        // Get all dataset values from the clicked button
                        const data = this.dataset;

                        // Set modal content
                        document.getElementById('machine').textContent = data.machine || '';
                        document.getElementById('job_ticket_number').textContent = data.job_ticket_number || '';
                        document.getElementById('job_name').textContent = data.job_name || '';
                        document.getElementById('rcl_code').textContent = data.rcl_code || '';
                        document.getElementById('impression').textContent = data.impression || '';
                        document.getElementById('shift').textContent = data.shift || '';
                        document.getElementById('line_supervisor').textContent = data.line_supervisor || '';
                        document.getElementById('operator').textContent = data.operator || '';
                        document.getElementById('helper').textContent = data.helper || '';
                        document.getElementById('qa_inspector').textContent = data.qa_inspector || '';
                        document.getElementById('date').textContent = data.date || '';

                        // Open the modal
                        const reportModal = new bootstrap.Modal(document.getElementById('reportInfoModal'));
                        reportModal.show();
                    });
                });

                document.getElementById('generateReportBtn').addEventListener('click', function () {
                    const jt = document.getElementById('job_ticket_number').textContent;
                    window.location.href = `generate_report.php?job_ticket_number=${encodeURIComponent(jt)}`;
                });
            });
        </script>




            <!-- Script for Get data from row --->
            <script>
            $(document).ready(function () {
                $('.loadHourlyReportBtn').on('click', function () {
                    let button = $(this);
                    let row = button.closest('tr');
                    let job_ticket_number = row.find('.job_ticket_number').val();
                    let job_name = row.find('.job_name').val();
                    let machine = row.find('.machine').val();
                    let impression = row.find('.impression').val(); // <-- FIXED HERE
                    let shift = row.find('.shift').val(); // <-- ADDED THIS LINE

                    $.ajax({
                        url: 'insert_hourly_report.php',
                        method: 'POST',
                        data: {
                            job_ticket_number: job_ticket_number,
                            job_name: job_name,
                            machine: machine,
                            impression: impression,
                            shift: shift // <-- ADDED THIS LINE
                        },
                        success: function (response) {
                            if (response.trim() === "success" || response.trim() === "exists") {
                                button.prop('disabled', true)
                                    .html("<i class='bx bx-check'></i>")
                                    .addClass('btn-success')
                                    .removeClass('btn-info')
                                    .css('opacity', '0.6');
                            }

                            if (response.trim() === "success") {
                                $('#loadSuccessModal').modal('show');
                            } else if (response.trim() === "exists") {
                                alert("This job ticket is already loaded to the hourly report.");
                            }
                        },
                        error: function () {
                            alert("There was an error loading the report.");
                            button.prop('disabled', false)
                                .html("<i class='bx bx-right-arrow-alt'></i>")
                                .removeClass('btn-success').addClass('btn-info')
                                .css('opacity', '1');
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