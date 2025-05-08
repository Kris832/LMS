<?php
include '../includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.html');
    exit();
}

// Fetch books
$sql = "SELECT * FROM books WHERE available_copies > 0 ORDER BY shelf_number ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Books</title>
    <link rel="stylesheet" href="../css/borrow_book.css">
</head>
<body>
    <div class="header">
        <h1>Borrow Books</h1>
        <a href="user_dashboard.html" class="button">Back to Dashboard</a>
        <a href="../pages/return_book.php" class="button">Return a Book</a>
        <a href="../pages/purchase_book.php" class="button">Purchase a Book</a>
    </div>
    <div class="container">
        <h1>Borrow Books</h1>

        <!-- Search Bar -->
        <div class="search-container">
            <select id="searchType">
                <option value="title">Search by Title</option>
                <option value="author">Search by Author</option>
                <option value="category">Search by Category</option>
            </select>
            <input type="text" id="searchInput" placeholder="Type to search...">
        </div>

        <!-- Borrow Books Table -->
        <form action="../actions/borrow_book_action.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Available Copies</th>
                    </tr>
                </thead>
                <tbody id="bookList">
                    <?php while ($book = $result->fetch_assoc()): ?>
                        <tr>
                            <td><input type="radio" name="book_id" value="<?= $book['book_id'] ?>" required></td>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= htmlspecialchars($book['category']) ?></td>
                            <td><?= htmlspecialchars($book['available_copies']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button type="submit">Borrow Book</button>
        </form>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchType = document.getElementById('searchType').value;
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll("#bookList tr");

            rows.forEach(row => {
                let cellValue = row.querySelector(`td:nth-child(${searchType === 'title' ? 2 : searchType === 'author' ? 3 : 4})`).textContent.toLowerCase();
                row.style.display = cellValue.includes(searchValue) ? "" : "none";
            });
        });
    </script>
</body>
</html>
