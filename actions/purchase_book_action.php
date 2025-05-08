<?php
include '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $book_id = intval($_POST['book_id']);
    $price = floatval($_POST['price']);
    $category = $_POST['category']; // Get category if available

    // Check if the book is still available and belongs to the selected category
    $query = "SELECT available_copies, category FROM books WHERE book_id = ? ORDER BY shelf_number ASC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if ($book && $book['available_copies'] > 0) {
        // Check if the book's category matches the selected category
        if ($book['category'] == $category || empty($category)) {
            // Deduct 1 copy from available books
            $updateQuery = "UPDATE books SET available_copies = available_copies - 1 WHERE book_id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("i", $book_id);
            $updateStmt->execute();

            // Record purchase
            $insertQuery = "INSERT INTO purchases (user_id, book_id, purchase_date, price) VALUES (?, ?, NOW(), ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iid", $user_id, $book_id, $price);
            $insertStmt->execute();

            echo "<script>alert('Payment Successful! Book Purchased.'); window.location.href='../pages/user_dashboard.html';</script>";
        } else {
            echo "<script>alert('Book does not belong to the selected category.'); window.location.href='../pages/purchase_book.php';</script>";
        }
    } else {
        echo "<script>alert('Book is no longer available!'); window.location.href='../pages/purchase_book.php';</script>";
    }
}
?>
