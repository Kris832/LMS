<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.html');
    exit();
}

include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $book_id = $_POST['book_id'];

    // Validate if the user has borrowed this book
    $sql = "
        SELECT record_id, borrow_date 
        FROM borrow_records 
        WHERE user_id = ? AND book_id = ? AND return_date IS NULL
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
        $record_id = $record['record_id'];
        $borrow_date = new DateTime($record['borrow_date']);

        // Define borrowing period and fine policy
        $allowed_days = 15; // 15 days allowed borrowing time
        $fine_per_day = 10; // $10 fine per day

        // Calculate due date and actual return date
        $due_date = clone $borrow_date;
        $due_date->modify("+$allowed_days days");
        $return_date = new DateTime(); 

        $fine = 0;
        if ($return_date > $due_date) {
            $days_late = $due_date->diff($return_date)->days;
            $fine = $days_late * $fine_per_day; // Calculate fine
        }

        // Update the borrow record to mark the book as returned and add fine
        $update_sql = "
            UPDATE borrow_records 
            SET return_date = NOW(), fine = ?, actual_return_date = NOW()
            WHERE record_id = ?
        ";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('di', $fine, $record_id);
        $update_stmt->execute();

        // Increment the available copies of the book
        $update_book_sql = "
            UPDATE books 
            SET available_copies = available_copies + 1 
            WHERE book_id = ?
        ";
        $update_book_stmt = $conn->prepare($update_book_sql);
        $update_book_stmt->bind_param('i', $book_id);
        $update_book_stmt->execute();

        // Set session message for notification
        if ($fine > 0) {
            $_SESSION['message'] = "Book returned successfully! Fine incurred: $fine.";
        } else {
            $_SESSION['message'] = "Book returned successfully! No fine incurred.";
        }
    } else {
        $_SESSION['error'] = "You have not borrowed this book or it has already been returned.";
    }

    header('Location: ../pages/return_book.php');
    exit();
}
?>
