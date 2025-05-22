<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Work Request</title>

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
        <?php include "includes/userdb_sidenav.php" ?>
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
                    <h1 class="h3 mb-2 text-gray-800">E-work Request</h1>

                    <!-- Button for Create Plate Modal -->
                    <div class="btn-group mb-2">
                            <button type="button" class="btn btn-lg btn-primary ml-2" id="createrequest" data-bs-toggle="modal" data-bs-target="#addRequestModal">Create Request</button>
                        </div>
                    
                    <!-- E-work Request Modal -->
                    <div class="modal fade" id="addRequestModal" tabindex="-1" aria-labelledby="addRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addRequestModalLabel">E-Work Request</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="requestForm">
                                        <!-- First Row: Email, PDB Number, Job Date -->
                                        <div class="row mb-3">
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <input type="text" class="form-control" name="pdb_number" placeholder="PDB Number">
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <select class="form-control" name="department" required>
                                                    <option value="">Select Department</option>
                                                    <option value="Production">Production</option>
                                                    <option value="Quality Assurance">Quality Assurance</option>
                                                    <option value="Research and Development">Research and Development</option>
                                                    <option value="PPIC">PPIC</option>
                                                    <option value="Accounts">Accounts</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <label for="jobDate"><strong>Job Date:</strong></label>
                                                <input type="date" id="jobDate" name="date" class="form-control" placeholder="Date" required readonly>
                                            </div>
                                        </div>

                                        <!-- Second Row: Job Ticket, Attachment -->
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-8">
                                                <input type="text" class="form-control" name="job_ticket_number" placeholder="Job Ticket Number">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <input type="file" class="form-control" name="attachment">
                                            </div>
                                        </div>

                            <h5>Request Details</h5>
                            <!-- Third Row: Customer Name, Product Description -->
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="product_description" placeholder="Product Description" required>
                                </div>
                            </div>

                            <!-- Fourth Row: Request Type, Quantity, Date Needed, Additional Instruction -->
                            <div class="row mb-3">
                                <div class="col-12 col-md-4">
                                    <label><strong>Request Type:</strong></label>
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle w-100" type="button" id="requestTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Select Request Type
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="requestTypeDropdown">
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Ink Laydown"> Ink Laydown</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="RCL Layout"> RCL Layout</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="E-Proof"> E-Proof</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Digital Proof"> Digital Proof</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Prototype"> Prototype</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Prototype/Mock-up"> Prototype/Mock-up</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Diecut Film"> Diecut Film</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Paper Area"> Paper Area</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Technical Drawing"> Technical Drawing</label></li>
                                            <li><label class="dropdown-item"><input type="checkbox" class="request-type" value="Sample Cutting"> Sample Cutting</label></li>
                                        </ul>
                                        <input type="hidden" name="request_type" id="selectedRequestTypes">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                </div>  
                                <div class="col-12 col-md-3">
                                    <label for="date_needed"><strong>Date Needed:</strong></label>
                                    <input type="date" class="form-control" name="date_needed" id="date_needed" required>
                                </div> 
                                <div class="col-12 col-md-3">
                                    <input type="text" class="form-control" name="additional_instruction" placeholder="Additional Instruction">
                                </div>
                            </div>

                            <!-- Fifth Row: Priority Level, Request By, Department -->
                            <div class="row mb-3">
                                <div class="col-12 col-md-4">
                                    <select class="form-control" name="priority_level" required>
                                        <option value="">Select Priority Level</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="request_by" placeholder="Request By" required>
                                </div>
                                <div class="col-12 col-md-4">
                                            <label for="edit_status"><strong>Status:</strong></label>
                                            <select class="form-select" name="status" id="edit_status" onchange="updateStatusColor(this)">
                                                <option value="Pending" selected>Pending</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Completed">Completed</option>
                                                <option value="On Hold">On Hold</option>
                                            </select>
                                            <span id="statusIndicator" class="badge mt-2" style="display:none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

                <!-- E-work Request Info Modal -->
                <div class="modal fade" id="requestInfoModal" tabindex="-1" aria-labelledby="requestInfoModalLabel" aria-hidden="true">                     
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="requestInfoModalLabel">E-work Request Information</h5>
                                <!-- Close button -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tr><th>PDB Number</th><td id="pdb_number"></td></tr>
                                    <tr><th>Job Date</th><td id="job_date"></td></tr>
                                    <tr><th>Job Ticket Number</th><td id="job_ticket_number"></td></tr>
                                    <tr><th>Attachment</th><td id="attachment"></td></tr>
                                    <tr><th>Customer Name</th><td id="customer_name"></td></tr>
                                    <tr><th>Product Description</th><td id="product_description"></td></tr>
                                    <tr><th>Request Type</th><td id="request_type"></td></tr>
                                    <tr><th>Quantity</th><td id="quantity"></td></tr>
                                    <tr><th>Additional Instruction</th><td id="additional_instruction"></td></tr>
                                    <tr><th>Priority Level</th><td id="priority_level"></td></tr>
                                    <tr><th>Request By</th><td id="request_by"></td></tr>
                                    <tr>
                                        <th>Department</th>
                                        <td id="department"></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span id="statusBadge" class="badge"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of E-work Request</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Department</th>
                                            <th>Request Type</th>
                                            <th>Request by</th>
                                            <th>Date Needed</th>
                                            <th>Status</th>
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

                                            $sql = "SELECT * FROM requests";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['customer_name'] . "</td>"; // Assuming 'email' field exists
                                                    echo "<td>" . $row['department'] . "</td>"; // Assuming 'pdb_number' field exists
                                                    echo "<td>" . $row['request_type'] . "</td>";
                                                    echo "<td>" . $row['request_by'] . "</td>"; // Assuming 'customer_name' field exists
                                                    echo "<td>" . $row['date_needed'] . "</td>"; // Assuming 'department' field exists
                                                    echo "<td>" . $row['status'] . "</td>"; // Assuming 'status' field exists
                                                    echo "<td>
                                                        <button class='btn btn-info btn-sm viewRequestInfo' data-id='" . $row['job_ticket_number'] . "'>Info</button>
                                                    </td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No requests found.</td></tr>";
                                            }
                                            $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

            <!-- Script for Automated Date -->
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const today = new Date();
                    const yyyy = today.getFullYear();
                    const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months start at 0!
                    const dd = String(today.getDate()).padStart(2, '0');
                    const formattedDate = `${yyyy}-${mm}-${dd}`;
    
                    document.getElementById('jobDate').value = formattedDate;
                });
            </script>

            <!-- Script for Disabling Past Dates for Date Needed -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const dateInput = document.getElementById('date_needed');
                    const today = new Date();
                    const yyyy = today.getFullYear();
                    const mm = String(today.getMonth() + 1).padStart(2, '0');
                    const dd = String(today.getDate()).padStart(2, '0');
                    const minDate = `${yyyy}-${mm}-${dd}`;
                    dateInput.min = minDate;
                });
            </script>
            
            <!-- Script for Request Info Modal -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Handle click events on buttons with class 'viewRequestInfo'
                    document.querySelectorAll('.viewRequestInfo').forEach(button => {
                        button.addEventListener('click', function () {
                            const jobTicketNumber = this.getAttribute('data-id');

                            // Fetch request info
                            fetch(`get_request_info.php?job_ticket_number=${jobTicketNumber}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data) {
                                        // Populate fields
                                        document.getElementById('pdb_number').textContent = data.pdb_number || '';
                                        document.getElementById('job_date').textContent = data.job_date || '';
                                        document.getElementById('job_ticket_number').textContent = data.job_ticket_number || '';

                                        // Attachment link or fallback
                                        const attachmentField = document.getElementById('attachment');
                                        if (data.attachment) {
                                            attachmentField.innerHTML = `<a href="view_attachment.php?job_ticket_number=${data.job_ticket_number}" target="_blank">View Attachment</a>`;
                                        } else {
                                            attachmentField.textContent = 'No Attachment';
                                        }

                                        document.getElementById('customer_name').textContent = data.customer_name || '';
                                        document.getElementById('product_description').textContent = data.product_description || '';
                                        
                                        // Handle multiple request types with badge styling
                                        const requestTypeElement = document.getElementById('request_type');
                                        if (Array.isArray(data.request_type)) {
                                            requestTypeElement.innerHTML = data.request_type.map(type => `<span class="badge badge-primary mr-1">${type}</span>`).join('');
                                        } else if (typeof data.request_type === 'string') {
                                            const types = data.request_type.split(',').map(s => s.trim());
                                            requestTypeElement.innerHTML = types.map(type => `<span class="badge badge-primary mr-1">${type}</span>`).join('');
                                        } else {
                                            requestTypeElement.textContent = 'N/A';
                                        }

                                        document.getElementById('quantity').textContent = data.quantity || '';
                                        document.getElementById('date_needed').textContent = data.date_needed || '';
                                        document.getElementById('additional_instruction').textContent = data.additional_instruction || '';
                                        document.getElementById('priority_level').textContent = data.priority_level || '';
                                        document.getElementById('request_by').textContent = data.request_by || '';
                                        document.getElementById('department').textContent = data.department || '';

                                        // Set status badge
                                        setStatusBadge(data.status || 'Unknown');

                                        // Show modal
                                        $('#requestInfoModal').modal('show');
                                    } else {
                                        alert('Error fetching request details.');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Error fetching request details.');
                                });
                        });
                    });
                });

                // Status badge logic
                function setStatusBadge(status) {
                    const badge = document.getElementById('statusBadge');
                    badge.textContent = status;

                    // Reset badge classes
                    badge.className = 'badge';

                    switch (status.toLowerCase()) {
                        case 'pending':
                            badge.classList.add('badge-warning');
                            break;
                        case 'approved':
                            badge.classList.add('badge-success');
                            break;
                        case 'in progress':
                            badge.classList.add('badge-info');
                            break;
                        case 'rejected':
                            badge.classList.add('badge-danger');
                            break;
                        default:
                            badge.classList.add('badge-secondary');
                    }
                }
            </script>


            <!-- Script for Request Modal -->
            <script>
                function submitForm() {
                    const form = document.getElementById('requestForm');
                    const formData = new FormData(form);

                    // Get request types from checkboxes
                    const selectedTypes = [];
                    document.querySelectorAll('.request-type:checked').forEach(checkbox => {
                    selectedTypes.push(checkbox.value);
                    });
                    formData.set('request_type', selectedTypes.join(','));

                    // Submit using fetch
                    fetch('submit_request.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        const trimmed = data.trim();
                        if (trimmed === 'success') {
                            window.location.href = 'ework.php';
                        } else {
                            alert('Error: ' + trimmed);
                        }
                    })
                    .catch(err => {
                        console.error('Fetch error:', err);
                        alert('Something went wrong. Please try again.');
                    });
                }
                </script> 


                <!-- Script for Edit E-work Request Modal -->
                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.querySelectorAll('.editRequestBtn').forEach(button => {
                        button.addEventListener('click', () => {
                            const jobTicket = button.getAttribute('data-id');

                            fetch('get_request.php?job_ticket_number=' + jobTicket)
                                .then(res => res.json())
                                .then(data => {
                                    if (!data || !data.job_ticket_number) {
                                        alert('Failed to load request data.');
                                        return;
                                    }

                                    // Fill input fields
                                    document.getElementById('edit_job_ticket_number').value = data.job_ticket_number;
                                    document.getElementById('edit_email').value = data.email;
                                    document.getElementById('edit_pdb_number').value = data.pdb_number;
                                    document.getElementById('edit_jobDate').value = data.date;
                                    document.getElementById('edit_customer_name').value = data.customer_name;
                                    document.getElementById('edit_product_description').value = data.product_description;
                                    document.getElementById('edit_quantity').value = data.quantity;
                                    document.getElementById('edit_date_needed').value = data.date_needed;
                                    document.getElementById('edit_additional_instruction').value = data.additional_instruction;
                                    document.getElementById('edit_priority_level').value = data.priority_level;
                                    document.getElementById('edit_request_by').value = data.request_by;
                                    document.getElementById('edit_department').value = data.department;
                                    document.getElementById('edit_status').value = data.status;

                                    // Set request types (checkboxes)
                                    const selectedTypes = data.request_type ? data.request_type.split(',') : [];
                                    const checkboxes = document.querySelectorAll('#edit_requestTypeList input[type="checkbox"]');
                                    checkboxes.forEach(cb => {
                                        cb.checked = selectedTypes.includes(cb.value.trim());
                                    });

                                    // Update hidden input value for request types
                                    document.getElementById('edit_selectedRequestTypes').value = selectedTypes.join(',');

                                    // Show modal
                                    const editModal = new bootstrap.Modal(document.getElementById('editRequestModal'));
                                    editModal.show();
                                })
                                .catch(err => {
                                    console.error('Fetch error:', err);
                                    alert('Error fetching request details.');
                                });
                        });
                    });
                });

                function updateRequest() {
                const jobTicketNumber = document.getElementById('edit_job_ticket_number').value;
                const status = document.getElementById('edit_status').value;

                const formData = new FormData();
                formData.append('job_ticket_number', jobTicketNumber);
                formData.append('status', status);

                fetch('update_request.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        alert('Status updated successfully!');
                        location.reload();
                    } else {
                        alert('Update failed: ' + response.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during update.');
                });
            }

                </script>

                <!-- Script E-work request Pending Status and Color Badge -->
                <script>
                function updateStatusColor(selectElement) {
                    const status = selectElement.value;
                    const indicator = document.getElementById('statusIndicator');
                    indicator.style.display = 'inline-block';

                    let colorClass = '';
                    switch (status) {
                        case 'Pending':
                            colorClass = 'bg-warning text-dark';
                            break;
                        case 'In Progress':
                            colorClass = 'bg-info text-dark';
                            break;
                        case 'Completed':
                            colorClass = 'bg-success';
                            break;
                        case 'On Hold':
                            colorClass = 'bg-secondary';
                            break;
                        default:
                            colorClass = 'bg-light text-dark';
                    }

                    indicator.className = `badge mt-2 ${colorClass}`;
                    indicator.innerText = status;
                }

                // When the edit modal is shown
                $('#editRequestModal').on('shown.bs.modal', function () {
                    const statusSelect = document.getElementById('edit_status');

                    // Set to Pending if no status is selected yet
                    if (!statusSelect.value) {
                        statusSelect.value = 'Pending';
                    }

                    // Update the color badge accordingly
                    updateStatusColor(statusSelect);
                });
            </script>

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