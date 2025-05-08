<?php
session_start();
require '../includes/db_connect.php';

if (!isset($_GET['book_id'])) {
    header('Location: ../pages/imanage_book.php');
    exit();
}

$book_id = $_GET['book_id'];
$query = "SELECT * FROM books WHERE book_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="../css/edit_book.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form action="../actions/iedit_book_action.php" method="POST">
        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
        
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>

        <label>Author:</label>
        <input type="text" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>

        <label>Category:</label>
        <input type="text" name="category" value="<?php echo htmlspecialchars($book['category']); ?>" required>

        <label>Total Copies:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($book['quantity']); ?>" required>

        <label>Available Copies:</label>
        <input type="number" name="available_copies" value="<?php echo htmlspecialchars($book['available_copies']); ?>" required>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($book['price']); ?>" required> 

        <label>Rack Number:</label>
        <input type="text" name="rack_number" value="<?php echo htmlspecialchars($book['rack_number']); ?>" required>

        <label>Shelf Number:</label>
        <input type="text" name="shelf_number" value="<?php echo htmlspecialchars($book['shelf_number']); ?>" required>

        <button type="submit">Update Book</button>
    </form>
</body>
</html>
