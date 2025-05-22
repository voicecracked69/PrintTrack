<?php 
include('db_connect.php');
session_start();

$error_message = "";

// If already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    $role = $user['role'];
                    $status = $user['status'];

                    if ($role === 'User' && $status === 'rejected') {
                        $error_message = "Your account has been rejected.";
                    } elseif ($status === 'pending' && $role === 'User') {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['fullname'] = $user['fullname'];
                        $_SESSION['role'] = $role;
                        $_SESSION['first_login'] = true;
                        header("Location: pending.php");
                        exit();
                    } elseif ($status === 'approved') {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['fullname'] = $user['fullname'];
                        $_SESSION['role'] = $role;
                        $_SESSION['first_login'] = true;

                        if ($role === 'Admin' || $role === 'Secondary') {
                            header("Location: dashboard.php");
                        } elseif ($role === 'Ework') {
                            header("Location: ework.php");
                        } elseif ($role === 'Production') {
                            header("Location: report.php");
                        } elseif ($role === 'User') {
                            header("Location: pending.php");
                        } else {
                            $error_message = "Unknown role.";
                        }
                        exit();
                    } else {
                        $error_message = "Invalid account status.";
                    }
                } else {
                    $error_message = "Invalid email or password.";
                }
            } else {
                $error_message = "Invalid email or password.";
            }

            $stmt->close();
        }
    } else {
        $error_message = "Both email and password are required.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-container p-4 border rounded shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Login</h2>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group text-center mb-2">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
            <div class="form-group text-center mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <div class="form-group text-center">
                <p>Don't have an account? <a href="signup.php" class="btn btn-link">Sign Up</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Toast Container -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="rejectedToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Your account has been rejected.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Show toast if account is rejected -->
<?php if ($error_message === "Your account has been rejected."): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('rejectedToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
<?php endif; ?>

</body>
</html>
