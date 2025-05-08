<?php
include '../includes/db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if ($book) {
        echo json_encode($book);
    } else {
        echo json_encode(["error" => "Book not found"]);
    }
}
?>
