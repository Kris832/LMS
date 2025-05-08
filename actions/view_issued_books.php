<?php
require '../includes/db_connect.php';

// Initialize search variables
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

// Fetch issued books data with search functionality
$sql = "SELECT br.record_id, b.book_id AS book_id, b.author AS book_author, u.name AS user_name, 
               b.title AS book_title, br.borrow_date, br.return_date
        FROM borrow_records br
        JOIN users u ON br.user_id = u.user_id
        JOIN books b ON br.book_id = b.book_id
        WHERE b.book_id LIKE '%$search%' 
           OR b.title LIKE '%$search%' 
           OR b.author LIKE '%$search%'";

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
    <title>View Issued Books</title>
    <link rel="stylesheet" href="../css/view_issued_book.css">
</head>
<body>
    <header>
        <h1>Issued Books</h1>
    </header>

    <section class="issued-books-section">
        <h2>List of Issued Books</h2>
        
        <!-- Search Form -->
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by Book ID, Title, or Author" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>User Name</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['record_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_author']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['borrow_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['return_date']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No issued books found.</p>
        <?php endif; ?>
    </section>
</body>
</html>