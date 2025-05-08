<?php
require '../includes/db_connect.php';

if (isset($_GET['book_id'])) {
    $book_id = intval($_GET['book_id']);
    $query = "SELECT * FROM books WHERE book_id = $book_id";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $year = intval($_POST['year']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $available_copies = intval($_POST['available_copies']);
        $price = intval($_POST['price']);

        $updateQuery = "UPDATE books SET 
            title = '$title', 
            author = '$author', 
            publisher = '$publisher', 
            year = $year, 
            category = '$category',
            available_copies = $available_copies ,
            price = $price
            WHERE book_id = $book_id";
        mysqli_query($conn, $updateQuery);

        header("Location: manage_books.php");
        exit();
    }
} else {
    header("Location: manage_books.php");
    exit();
}
?>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="../css/edit_book.css">
</head>
<body>
    <header>
        <h1>Edit Book</h1>
    </header>
    <section class="edit-book-section">
        <form method="POST" action="edit_books.php?book_id=<?= $book['book_id'] ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $book['title'] ?>">

            <label for="author">Author:</label> 
            <input type="text" id="author" name="author" value="<?= $book['author'] ?>">

            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" value="<?= $book['publisher'] ?>">

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" value="<?= $book['year'] ?>">

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?= $book['category'] ?>">

            <label for="available_copies">Available Copies:</label>
            <input type="number" id="available_copies" name="available_copies" value="<?= $book['available_copies'] ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?= $book['price'] ?>">

            <button type="submit">Save Changes</button> 
        </form>
    </section>
</body>
</html>