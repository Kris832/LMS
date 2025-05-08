<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="../css/iadd_books.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form action="../actions/iadd_book_action.php" method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Author:</label>
        <input type="text" name="author" required>

        <label>Publisher:</label>
        <input type="text" name="publisher" required>

        <label>Year:</label>
        <input type="number" name="year" required>

        <label>Category:</label>
        <input type="text" name="category" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>

        <label>Price:</label>
        <input type="number" name="price" required>

        <label>Rack Number:</label>
        <input type="number" name="rack_number" required>

        <label>Shelf Number:</label>        
        <input type="number" name="shelf_number" required>

        <button type="submit">Add Book</button>
    </form>
</body>
</html>
