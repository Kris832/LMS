<?php
// db_connect.php should contain database connection details
include_once '../includes/db_connect.php';

// Start a session
    session_start();

    // Check if the admin is logged in
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ../actions/admin_login.php');
        exit;
    }


    $totalBooksQuery = "SELECT COUNT(*) AS total_books FROM books";
    $totalBooksResult = mysqli_query($conn, $totalBooksQuery);
    $totalBooks = mysqli_fetch_assoc($totalBooksResult)['total_books'] ?? 0;

    $issuedBooksQuery = "SELECT COUNT(*) AS borrowed_books FROM borrow_records";
    $issuedBooksResult = mysqli_query($conn, $issuedBooksQuery);
    $issuedBooks = mysqli_fetch_assoc($issuedBooksResult)['borrowed_books'] ?? 0;

    $registeredUsersQuery = "SELECT COUNT(*) AS registered_users FROM users";
    $registeredUsersResult = mysqli_query($conn, $registeredUsersQuery);
    $registeredUsers = mysqli_fetch_assoc($registeredUsersResult)['registered_users'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/adash.css">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="../pages/add_books.html">Add Books</a></li>
                    <li><a href="../pages/aview_tbooks.php">View Books</a></li>
                    <li><a href="../pages/amanage_user.php">Manage Users</a></li>
                    <li><a href="../pages/manage_books.php">Manage Books</a></li>
                    <li><a href="../actions/view_issued_books.php">View Issued Books</a></li>
                    <li><a href="../actions/view_purchased_books.php" class="btn">View Purchased Books</a></li>
                    <li><a href="../pages/generate_report.php">Generate Reports</a></li>
                    <li><a href="../actions/alogout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main class="dashboard-main">
            <section class="dashboard-section">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h2>
                <p>Use the navigation menu to manage the library system.</p>
                <div class="stats">
                    <div class="stat-card">
                        <h3>Total Books</h3>
                        <p><?php echo $totalBooks; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Total Users</h3>
                        <p><?php echo $registeredUsers; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Issued Books</h3>
                        <p><?php echo $issuedBooks; ?></p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>