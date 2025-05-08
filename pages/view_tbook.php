<?php
session_start();
include '../includes/db_connect.php';

// Fetch books
$sql = "SELECT * FROM books ORDER BY shelf_number ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="../css/view_book.css">
</head>
<body>
    <div class="header">
        <h1>View Books</h1>
        <a href="../actions/librarian_dashboard.php" class="button">Back to Dashboard</a>
    </div>
    <div class="container">
        <div class="search-container">
            <input type="text" id="searchInput" class="search-input" placeholder="Search by Title...">
            <button class="filter-btn" id="filterBtn">&#x1F50D;</button>
            <div class="filter-dropdown" id="filterDropdown">
                <a href="#" data-type="title">Title</a>
                <a href="#" data-type="author">Author</a>
                <a href="#" data-type="category">Category</a>
            </div>
        </div>

        <!-- Books Table -->
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Available Copies</th>
                    <th>Price</th>
                    <th>Rack</th>
                    <th>Shelf</th>
                </tr>
            </thead>
            <tbody id="bookList">
                <?php while ($book = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['author']) ?></td>
                        <td><?= htmlspecialchars($book['category']) ?></td>
                        <td><?= htmlspecialchars($book['available_copies']) ?></td>
                        <td><?= htmlspecialchars($book['price']) ?></td>
                        <td><?= htmlspecialchars($book['rack_number']) ?></td>
                        <td><?= htmlspecialchars($book['shelf_number']) ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const filterBtn = document.getElementById("filterBtn");
            const filterDropdown = document.getElementById("filterDropdown");
            const searchInput = document.getElementById("searchInput");
            let searchType = "title";

            filterBtn.addEventListener("click", function () {
                filterDropdown.style.display = filterDropdown.style.display === "block" ? "none" : "block";
            });

            document.querySelectorAll(".filter-dropdown a").forEach(item => {
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    searchType = this.getAttribute("data-type");
                    searchInput.placeholder = "Search by " + this.textContent + "...";
                    filterDropdown.style.display = "none";
                    searchInput.focus();
                });
            });

            searchInput.addEventListener("input", function () {
                let searchValue = this.value.toLowerCase();
                let rows = document.querySelectorAll("#bookList tr");

                rows.forEach(row => {
                    let cellIndex = searchType === 'title' ? 0 : searchType === 'author' ? 1 : 2;
                    let cellValue = row.cells[cellIndex].textContent.toLowerCase();
                    row.style.display = cellValue.includes(searchValue) ? "" : "none";
                });
            });

            document.addEventListener("click", function (event) {
                if (!filterBtn.contains(event.target) && !filterDropdown.contains(event.target)) {
                    filterDropdown.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
