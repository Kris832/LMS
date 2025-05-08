<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="../css/return_books.css">
</head>
<body>
    <div class="header">
        <h1>Return a Book</h1>
        <a href="user_dashboard.html" class="button">Back to Dashboard</a>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<script>alert('" . $_SESSION['message'] . "');</script>";
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['error'])) {
        echo "<script>alert('" . $_SESSION['error'] . "');</script>";
        unset($_SESSION['error']);
    }
    ?>

    <div class="content">
        <h2>Your Borrowed Books</h2>
        <form action="../actions/return_book_action.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Borrow Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../includes/db_connect.php';
                    $user_id = $_SESSION['user_id'];

                    $sql = "
                        SELECT borrow_records.book_id, books.title, books.author, borrow_records.borrow_date
                        FROM borrow_records
                        INNER JOIN books ON borrow_records.book_id = books.book_id
                        WHERE borrow_records.user_id = ? AND borrow_records.return_date IS NULL
                    ";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i', $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='radio' name='book_id' value='" . $row['book_id'] . "'></td>";
                        echo "<td>" . $row['book_id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                        echo "<td>" . $row['borrow_date'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="button">Return Book</button>
        </form>
    </div>
</body>
</html>
