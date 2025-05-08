<?php
require '../includes/db_connect.php';

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // First, delete the related records in purchases
    $delete_purchases = "DELETE FROM purchases WHERE book_id = ?";
    $stmt1 = $conn->prepare($delete_purchases);
    $stmt1->bind_param("i", $book_id);
    $stmt1->execute();
    
    // Then, delete the book
    $delete_book = "DELETE FROM books WHERE book_id = ?";
    $stmt2 = $conn->prepare($delete_book);
    $stmt2->bind_param("i", $book_id);
    
    if ($stmt2->execute()) {
        echo "<script>alert('Book deleted successfully'); window.location.href = '../pages/imanage_book.php';</script>";
    } else {
        echo "<script>alert('Error deleting book'); window.location.href = '../pages/imanage_book.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href = '../pages/imanage_book.php';</script>";
}
?>

 