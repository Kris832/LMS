<?php
// register.php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the email is already registered
    $query = "SELECT user_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email is already registered.'); window.location.href='../pages/register.html';</script>";
    } else {
        // Insert user into the database
        $insertQuery = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sss", $name, $email, $password);

        if ($insertStmt->execute()) {
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='../pages/login.html';</script>";
        } else {
            echo "<script>alert('Error during registration. Please try again.'); window.location.href='../pages/register.html';</script>";
        }
    }
}
?>
