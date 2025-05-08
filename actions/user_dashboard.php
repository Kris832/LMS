<?php
// user_dashboard.php

// Check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Session user_id not set. Redirecting to login.";
    header('Location: ../pages/login.html');
    exit();
}
echo "Session user_id: " . $_SESSION['user_id'];

include '../includes/db_connect.php'; // Database connection

$user_id = $_SESSION['user_id'];

// Fetch user details
$sql = "SELECT name FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$user_name = $user['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/user_dashboard.css">
</head>
<body>
    <div class="header">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?></h1>
        <nav>
            <ul>
                <li><a href="../pages/view_books.php">View Books</a></li>
                <li><a href="../pages/borrow_books.php">Borrow Book</a></li>
                <li><a href="../pages/return_book.php">Return Book</a></li>
                <li><a href="../pages/purchase_book.php">Purchase Book</a></li>
                <li><a href="../actions/logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h2>Dashboard Options</h2>
        <p>Select an option from the menu above to view books, borrow a book, return a book, or purchase a book.</p>

        <div class="dashboard-actions">
            <div class="action-card">
                <h3>View Books</h3>
                <p>Browse available books in the library.</p>
                <a href="../pages/view_books.php" class="button">View Books</a>
            </div>

            <div class="action-card">
                <h3>Borrow Book</h3>
                <p>Choose a book to borrow from the library.</p>
                <a href="../pages/borrow_books.php" class="button">Borrow Book</a>
            </div>

            <div class="action-card">
                <h3>Return Book</h3>
                <p>Return a book you previously borrowed.</p>
                <a href="../pages/return_book.php" class="button">Return Book</a>
            </div>

            <div class="action-card">
                <h3>Purchase Book</h3>
                <p>Buy a book to own it permanently.</p>
                <a href="../pages/purchase_books.php" class="button">Purchase Book</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </div>
</body>
</html>
