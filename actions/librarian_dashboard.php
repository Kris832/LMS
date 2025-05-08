<?php
// librarian_dashboard.php
session_start();

// Check if the librarian is logged in
if (!isset($_SESSION['librarian_id'])) {
    header('Location: ../pages/librarian_login.html');
    exit();
}

include_once '../includes/db_connect.php';

// Fetch statistics from the database
$totalBooksQuery = "SELECT COUNT(*) AS total_books FROM books";
$totalBooksResult = mysqli_query($conn, $totalBooksQuery);
$totalBooks = mysqli_fetch_assoc($totalBooksResult)['total_books'] ?? 0;

$issuedBooksQuery = "SELECT COUNT(*) AS issued_books FROM borrow_records";
$issuedBooksResult = mysqli_query($conn, $issuedBooksQuery);
$issuedBooks = mysqli_fetch_assoc($issuedBooksResult)['issued_books'] ?? 0;

$registeredUsersQuery = "SELECT COUNT(*) AS registered_users FROM users";
$registeredUsersResult = mysqli_query($conn, $registeredUsersQuery);
$registeredUsers = mysqli_fetch_assoc($registeredUsersResult)['registered_users'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <link rel="stylesheet" href="../css/lib_dashboards.css">
</head>
<body>
    <header class="dashboard-header">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['librarian_name']); ?>!</h1>
        <nav>
            <ul>
                <li><a href="../pages/lview_issued_books.php" class="action-button">Borrowed Books</a></li>
                <li><a href="../pages/manage_users.php" class="action-button">Manage Users</a></li>
                <li><a href="../pages/imanage_book.php" class="action-button">Manage Books</a></li>
                <li><a href="../pages/view_tbook.php" class="action-button">View Books</a></li>
                <li><a href="../actions/llogout.php" class="action-button" >Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-section">
            <h2>Quick Actions</h2>
            <div class="actions">
                <a href="../pages/ladd_book.html" class="action-button">Add New Book</a>
                <a href="../actions/lview_issued_books.php" class="action-button">View Issued Books</a>
                <a href="../actions/lview_purchased_books.php" class="action-button">View Purchased Books</a>
                <a href="../pages/manage_users.php" class="action-button">View Registered Users</a>

            </div>
        </section>

        <section class="stats-section">
            <h2>Library Stats</h2>
            <div class="stats">
                <div class="stat">
                    <h3>Total Books</h3>
                    <p><?php echo $totalBooks; ?></p>
                </div>
                <div class="stat">
                    <h3>Issued Books</h3>
                    <p><?php echo $issuedBooks; ?></p>
                </div>
                <div class="stat">
                    <h3>Registered Users</h3>
                    <p><?php echo $registeredUsers; ?></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
