<?php
require '../includes/db_connect.php';
session_start();

// Fetch all borrowed books
$sql = "SELECT br.record_id, br.borrow_date, br.return_date, 
               u.name AS user_name, u.email, b.title AS book_title, b.author 
        FROM borrow_records br
        JOIN users u ON br.user_id = u.user_id
        JOIN books b ON br.book_id = b.book_id
        ORDER BY br.borrow_date DESC";
$result = mysqli_query($conn, $sql);

// Check for database query errors
if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Borrowed Books</title>
    <link rel="stylesheet" href="../css/lview_issued_book.css">
</head>
<body>
    <header>
        <h1>Borrowed Books</h1>
        <a href="../actions/librarian_dashboard.php" class="back-btn">Back to Dashboard</a>
    </header>

    <section class="borrowed-books-section">
        <h2>List of Borrowed Books</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['record_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['author']); ?></td>
                            <td><?php echo htmlspecialchars($row['borrow_date']); ?></td>
                            <td><?php echo $row['return_date'] ? htmlspecialchars($row['return_date']) : 'Not Returned'; ?></td>
                            <td><?php echo $row['return_date'] ? '<span class="returned">Returned</span>' : '<span class="pending">Borrowed</span>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books have been borrowed yet.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 Library Management System</p>
    </footer>
</body>
</html>
