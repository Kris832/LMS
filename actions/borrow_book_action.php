<?php
include '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $book_id = intval($_POST['book_id']);

    // Check book availability and price
    $query = "SELECT available_copies, price FROM books WHERE book_id = ? ORDER BY shelf_number ASC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if ($book && $book['available_copies'] > 0) {
        // Calculate borrowing price
        $borrowing_price = $book['price'] / 3;

        // Update book availability and insert borrow record
        $updateQuery = "UPDATE books SET available_copies = available_copies - 1 WHERE book_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("i", $book_id);
        $updateStmt->execute();

        $insertQuery = "INSERT INTO borrow_records (user_id, book_id, borrow_date, price) VALUES (?, ?, NOW(), ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("iid", $user_id, $book_id, $borrowing_price);
        $insertStmt->execute();

        echo "<script>alert('Book borrowed successfully!'); window.location.href='../pages/user_dashboard.html';</script>";
    } else {
        echo "<script>alert('Book not available.'); window.location.href='../pages/borrow_book.php';</script>";
    }
}
?>
