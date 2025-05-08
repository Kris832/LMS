<?php
include '../includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.html');
    exit();
}

// Fetch books
$query = "SELECT * FROM books WHERE available_copies > 0 ORDER BY shelf_number ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Books</title>
    <link rel="stylesheet" href="../css/purchase_book.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const category = "";
            const backgrounds = {
                'Fiction': "url('../images/fiction.jpg')",
                'Science Fiction': "url('../images/sci_fiction.jpg')",
                'Mystery & Thriller': "url('../images/myst.jpg')",
                'Fantasy': "url('../images/fnt.jpg')",
                'Non-Fiction': "url('../images/nonfiction.jpg')",
                'Default': "url('../images/dfp.jpg')"
            };
            document.body.style.backgroundImage = backgrounds[category] || backgrounds['Default'];
        });
    </script>
</head>
<body>
    <div class="header">
        <h1>Purchase Book</h1>
        <a href="user_dashboard.html" class="button">Back to Dashboard</a>
        <a href="../pages/borrow_book.php" class="button">Borrow a Book</a>
    </div>

    <div class="container">
        <div class="search-container">
            <select id="searchType">
                <option value="title">Search by Title</option>
                <option value="author">Search by Author</option>
                <option value="category">Search by Category</option>
            </select>
            <input type="text" id="searchInput" placeholder="Type to search...">
        </div>

        <!-- Books Table -->
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Reck</th>
                    <th>Shelf</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bookList">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td><?= htmlspecialchars($row['category']) ?></td>
                        <td>$<?= htmlspecialchars($row['price']) ?></td>
                        <td><?= htmlspecialchars($row['rack_number']) ?></td>
                        <td><?= htmlspecialchars($row['shelf_number']) ?></td>
                        <td><a href='payment_success.php?book_id=<?= $row['book_id'] ?>&price=<?= $row['price'] ?>' class='purchase-link'>Purchase</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchType = document.getElementById('searchType').value;
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll("#bookList tr");

            rows.forEach(row => {
                let cellValue = row.querySelector(`td:nth-child(${searchType === 'title' ? 1 : searchType === 'author' ? 2 : 3})`).textContent.toLowerCase();
                row.style.display = cellValue.includes(searchValue) ? "" : "none";
            });
        });
    </script>
</body>
</html>
