<?php
// login_user.php
include_once '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch and sanitize input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Fetch user from database
    $query = "SELECT user_id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id']; // Ensure the column name matches the DB
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            // Debug: Output session variables (remove in production)
            error_log("Session user_id: " . $_SESSION['user_id']);
            error_log("Session user_name: " . $_SESSION['user_name']);

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header('Location: ../pages/admin_dashboard.html');
            } else {
                header('Location: ../pages/user_dashboard.html');
            }
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='../pages/login.html';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('Email not found. Please register first.'); window.location.href='../pages/register.html';</script>";
    }

    $stmt->close();
}
?>
