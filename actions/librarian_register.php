<?php
// librarian_register.php
include_once '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.location.href='../librarian_register.html';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists
    $checkEmailQuery = "SELECT id FROM librarians WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        echo "<script>alert('Email already registered. Please use a different email.'); window.location.href='../librarian_register.html';</script>";
    } else {
        // Insert librarian into database
        $query = "INSERT INTO librarians (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registration successful! You can now log in.'); window.location.href='../pages/librarian_login.html';</script>";
        } else {
            echo "<script>alert('Error during registration. Please try again.'); window.location.href='../librarian_register.html';</script>";
        }
    }
}
?>