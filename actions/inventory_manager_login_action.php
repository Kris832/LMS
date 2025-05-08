<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM inventory_managers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['inventory_manager_id'] = $user['id'];
            $_SESSION['inventory_manager_username'] = $user['username'];
            header("Location: ../pages/inventory_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href = '../pages/inventory_manager_login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username!'); window.location.href = '../inventory_manager/login.php';</script>";
    }
}
?>
