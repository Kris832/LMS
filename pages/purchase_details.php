<?php
include '../includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.html');
    exit();
}

if (!isset($_GET['book_id'])) {
    echo "<script>alert('No book selected!'); window.location.href='purchase_book.php';</script>";
    exit();
}

$book_id = intval($_GET['book_id']);
$query = "SELECT title, author, price FROM books WHERE book_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    echo "<script>alert('Book not found!'); window.location.href='purchase_book.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="../css/purchase_details.css">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($book['title']); ?></h1>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
        <p><strong>Price:</strong> $<?php echo htmlspecialchars($book['price']); ?></p>
        <form action="payment.php" method="POST">
            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
            <input type="hidden" name="price" value="<?php echo $book['price']; ?>">
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
