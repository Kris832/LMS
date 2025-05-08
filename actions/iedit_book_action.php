<?php
session_start();
if (!isset($_SESSION['inventory_manager_id'])) {
    header('Location: ../pages/inventory_manager_login.php');
    exit();
}
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $available_copies = $_POST['available_copies'];
    $price = $_POST['price'];
    $rack_number = $_POST['rack_number'];
    $shelf_number = $_POST['shelf_number'];

    $sql = "UPDATE books 
            SET title = ?, author = ?, category = ?, quantity = ?, available_copies = ?, price = ?, rack_number = ?, shelf_number = ? 
            WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiissi", $title, $author, $category, $quantity, $available_copies, $price, $rack_number, $shelf_number, $book_id);

    if ($stmt->execute()) {
        header("Location: ../pages/imanage_book.php?success=Book updated successfully");
        exit();
    } else {
        header("Location: ../pages/iedit_book.php?book_id=$book_id&error=Failed to update book");
        exit();
    }
}
?>
