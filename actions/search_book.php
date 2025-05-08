<?php
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);

    $sql = "SELECT * FROM books WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="../css/search_book.css">
</head>
<body>
    <header>
        <h1>Search Books</h1>
        <a href="../pages/home.html" class="button">Back to Home</a>
    </header>

    <section class="search-section">
        <form class="search-form" method="POST" action="">
            <input type="text" name="search_query" placeholder="Search by title or author" required>
            <button type="submit">Search</button>
        </form>
    </section>

    <section class="results-section">
        <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
            <h2>Search Results</h2>
            <div id="results">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="result-card">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><strong>Author:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                        <p><strong>Publisher:</strong> <?php echo htmlspecialchars($row['publisher']); ?></p>
                        <p><strong>Year:</strong> <?php echo htmlspecialchars($row['year']); ?></p>
                        <p><strong>Rack:</strong> <?php echo htmlspecialchars($row['rack_number']); ?></p>
                        <p><srong>Shelf:</strong> <?php echo htmlspecialchars($row['shelf_number']); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php elseif (isset($result)): ?>
            <h2>No Results Found</h2>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
