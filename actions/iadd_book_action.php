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
    
    // SQL to insert book
    $sql = "INSERT INTO books (title, author,publisher,year, category, quantity, price, rack_number, shelf_number) 
            VALUES ('$title', '$author', '$category','$publisher', $year, $quantity ,$price, $reck, $shelf)";

    if (mysqli_query($conn, $sql)) {
        echo "Book added successfully.";
        header("Location: ../pages/imanage_book.php"); // Redirect to the add book page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
