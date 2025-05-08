<?php
include '../includes/db_connect.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch books based on category filter
if ($category) {
    $query = "SELECT * FROM books WHERE category = ? AND available_copies > 0 ORDER BY shelf_number ASC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
} else {
    $query = "SELECT * FROM books WHERE available_copies > 0";
    $stmt = $conn->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
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
    <div class="container">
        <h1>Available Books</h1>
        <form action="view_books.php" method="GET">
            <label for="category">Filter by Category:</label>
            <select name="category" id="category">
                <option value="">--Select Category--</option>
                <option value="fiction" <?php if($category == 'fiction') echo 'selected'; ?>>Fiction</option>
                <option value="nonfiction" <?php if($category == 'non-fiction') echo 'selected'; ?>>Non-fiction</option>
                <option value="science" <?php if($category == 'science fiction') echo 'selected'; ?>>Science</option>
                <option value="history" <?php if($category == 'fantasy') echo 'selected'; ?>>History</option>
                <!-- Add more categories here -->
            </select>
            <button type="submit" class="button">Apply Filter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Reck</th>
                    <th>Shelf</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['author']); ?></td>
                        <td>$<?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['rack_number']);?></td>
                        <td><?php echo htmlspecialchars($row['shelf_number']);?></td>
                        <td><a href="payment_page.php?book_id=<?php echo $row['book_id']; ?>" class="button">Purchase</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
