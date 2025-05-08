<?php
session_start();

require '../includes/db_connect.php';

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="../css/imanage_books.css">
</head>
<body>
    <h1>Book Inventory</h1>
    <a href="../pages/iadd_book.php">Add New Book</a>
    <table>
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Available Copies</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['author']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['available_copies']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>
                        <a href="../pages/iedit_book.php?book_id=<?php echo $row['book_id']; ?>">Edit</a>
                        <a href="../actions/delete_book_action.php?book_id=<?php echo $row['book_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
