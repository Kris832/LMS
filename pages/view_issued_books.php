<?php
require '../includes/db_connect.php';

// Fetch all issued books
$sql = "SELECT br.record_id, br.borrow_date, br.return_date, u.name AS user_name, b.title AS book_title
        FROM borrow_records br
        JOIN users u ON br.user_id = u.user_id
        JOIN books b ON br.book_id = b.book_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Issued Books</title>
    <link rel="stylesheet" href="../css/view_issued_book.css">
</head>
<body>
    <header>
        <h1>Issued Books</h1>
    </header>
    <div class="search-container">
            <input type="text" id="searchInput" class="search-input" placeholder="Search by Title...">
            <button class="filter-btn" id="filterBtn">&#x1F50D;</button>
            <div class="filter-dropdown" id="filterDropdown">
                <a href="#" data-type="title">Title</a>
                <a href="#" data-type="author">Author</a>
                <a href="#" data-type="category">Category</a>
            </div>
        </div>
    </div>
    <section class="issued-books-section">
        <h2>List of Issued Books</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>User</th>
                        <th>Book</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['record_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['borrow_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['return_date'] ?? 'Not Returned'); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No issued books found.</p>
        <?php endif; ?>
    </section>
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
    <footer>
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
