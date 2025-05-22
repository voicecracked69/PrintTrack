<?php
// Include your database connection file
include('db_connect.php'); // Assuming you have a separate file for DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $bio_id = $_POST['bio-id'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $disney = $_POST['disney'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into the database with role included
$sql = "INSERT INTO users (bio_id, email, fullname, department, disney, password, role)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $role = 'User'; // Default role
    // Correct bind_param with "issssss" for 7 parameters
    $stmt->bind_param("issssss", $bio_id, $email, $fullname, $department, $disney, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "User registered successfully!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

}

$conn->close();
?>


 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
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
    <!-- Boxicons Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Poppins Link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Signup</title>
</head>

<body>

           <!-- Signup Form Container -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="signup-container p-4 border rounded shadow-sm" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form action="signup.php" method="POST">
            <div class="form-group mb-3">
                <label for="bio-id">Bio ID</label>
                <input type="number" name="bio-id" id="bio-id" class="form-control" required min="0" max="99999" maxlength="5" oninput="if(this.value.length > 5) this.value = this.value.slice(0,5);">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="Last Name, First Name, Middle Name" required>
            </div>
            <div class="form-group mb-3">
                <label for="department">Department</label>
                <select name="department" class="form-select" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="Accounts">ACCOUNTS</option>
                    <option value="PPIC">PPIC</option>
                    <option value="R&D">R&D</option>
                    <option value="QA">QA</option>
                    <option value="Production">PRODUCTION</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="disney">Assigned Area</label>
                <select name="disney" class="form-select" required>
                    <option value="" disabled selected>Assigned Area</option>
                    <option value="Disney 1">D1</option>
                    <option value="Disney 2">D2</option>
                    <option value="Disney 3">D3</option>
                    <option value="Disney 4">D8</option>
                    <option value="Disney 5">D5</option>
                    <option value="Disney 6">D6</option>
                    <option value="Disney 7">D7</option>
                    <option value="Disney 8">HAMFI</option>
                    <option value="Disney 8">HASBRO</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" class="form-control" required>
            </div>
            <div class="form-group d-grid mb-3">
                <button type="submit" class="btn btn-success">Sign Up</button>
            </div>
            <div class="form-group text-center">
                <a href="index.php">Already have an account? Login</a>
            </div>
        </form>
    </div>
</div>


</body>
</html>