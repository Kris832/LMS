<?php
include '../includes/db_connect.php';
session_start();

// Ensure only authorized users can access
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../actions/admin_login.php");
    exit();
}

// Initialize search variables
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

// Fetch purchased books with search functionality
$sql = "SELECT p.purchase_id, b.book_id, b.title, u.name AS buyer_name, p.price, p.purchase_date 
        FROM purchases p
        JOIN books b ON p.book_id = b.book_id
        JOIN users u ON p.user_id = u.user_id
        WHERE b.book_id LIKE '%$search%' 
           OR b.title LIKE '%$search%' 
           OR u.name LIKE '%$search%'
        ORDER BY p.purchase_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Purchased Books</title>
    <link rel="stylesheet" href="../css/view_purchased_book.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">Purchased Books</h1>
            <ul class="nav-links">
                <li><a href="../actions/librarian_dashboard.php" class="btn">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2>Purchased Books List</h2>

        <!-- Search Form -->
        <form method="GET" action="" class="search-container">
            <input type="text" name="search" class="search-input" placeholder="Search by Book ID, Title, or Buyer Name" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="search-btn">Search</button>
        </form>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Buyer Name</th>
                        <th>Price</th>
                        <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['purchase_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['buyer_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['price']); ?></td>
                            <td><?php echo htmlspecialchars($row['purchase_date']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No purchased books found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
