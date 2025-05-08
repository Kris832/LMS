<?php
include '../includes/db_connect.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
    $year = (int)$_POST['year'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $price = (int)$_POST['price'];
    $reck = (int)$_POST['rack_number'];
    $shelf = (int)$_POST['shelf_number'];
    $copies = $quantity;
    
    // SQL to insert book
    $sql = "INSERT INTO books (title, author, publisher, year, category, quantity, price, rack_number, shelf_number,available_copies) 
            VALUES ('$title', '$author', '$publisher', $year, '$category', $quantity ,$price, $reck, $shelf, $copies)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Book added successfully.');</script>";
        header("Location: ../pages/view_books.php"); // Redirect to the add book page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
