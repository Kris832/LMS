<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists
    $check_sql = "SELECT * FROM inventory_managers WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = "Username or Email already exists!";
        header("Location: ../pages/inventory_register.php");
        exit();
    }

    // Insert new manager
    $sql = "INSERT INTO inventory_managers (name, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../pages/inventory_manager_login.php");
        exit();
    } else {
        $_SESSION['register_error'] = "Registration failed, try again!";
        header("Location: ../pages/inventory_register.php");
        exit();
    }
}
?>
