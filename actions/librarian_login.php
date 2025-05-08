<?php
// librarian_login.php
include_once '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Fetch librarian from database
    $query = "SELECT id, name, password FROM librarians WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $librarian = mysqli_fetch_assoc($result);
        if (password_verify($password, $librarian['password'])) {
            $_SESSION['librarian_id'] = $librarian['id'];
            $_SESSION['librarian_name'] = $librarian['name'];
            header('Location: ../actions/librarian_dashboard.php');
            exit();
        } else {
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='../pages/librarian_login.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found. Please contact admin.'); window.location.href='../pages/librarian_login.html';</script>";
    }
}
?>