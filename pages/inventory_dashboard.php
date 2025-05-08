<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Dashboard</title>
    <link rel="stylesheet" href="../css/i_dashboard.css">
</head>
<body>

    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1>Inventory Manager Dashboard</h1>
            <a href="../actions/ilogout.php" class="logout-btn">Logout</a>
        </div>

        <!-- Navigation Links -->
        <div class="dashboard-nav">
            <a href="../pages/iview_tbooks.php">View Books</a>
            <a href="../pages/iadd_book.html">Add Book</a>
            <a href="../pages/imanage_book.php">Update Book</a>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <h2>Welcome, Inventory Manager</h2>
            <p>Manage book inventory efficiently.</p>
        </div>
    </div>

</body>
</html>
