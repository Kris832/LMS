<?php
require '../includes/db_connect.php';

// Handle book deletion
if (isset($_GET['delete'])) {
    $book_id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM books WHERE book_id = $book_id";
    mysqli_query($conn, $deleteQuery);
    header("Location: manage_books.php");
    exit();
}

// Fetch all books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="../css/manage_books.css">
</head>
<body>
    <header>
        <h1>Manage Books</h1>
        <nav>
            <ul>
                <li><a href="../pages/add_books.html">Add Book</a></li>
                <li><a href="../actions/admin_dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <section class="book-list-section">
        <h2>Book List</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Available Copies</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($row['author'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($row['publisher'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($row['year'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($row['category'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($row['available_copies'] ?? '0'); ?></td>
                            <td>
                                <a href="../pages/edit_books.php?book_id=<?php echo $row['book_id']; ?>" class="edit-btn">Edit</a>
                                <a href="manage_books.php?delete=<?php echo $row['book_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books found.</p>
        <?php endif; ?>
    </section>
</body>
</html>
