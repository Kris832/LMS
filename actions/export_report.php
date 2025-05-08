<?php
// export_report.php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_type = $_POST['report_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $filename = "report_" . $report_type . "_" . date('Y-m-d') . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

    if ($report_type == "borrow_records") {
        fputcsv($output, ['Book ID', 'Title', 'Borrower Name', 'Borrow Date', 'Return Date', 'Fine']);
        $sql = "SELECT br.book_id, b.title, u.name, 
                       DATE_FORMAT(br.borrow_date, '=\"%Y-%m-%d\"') AS borrow_date, 
                       DATE_FORMAT(br.return_date, '=\"%Y-%m-%d\"') AS return_date, 
                       br.fine
                FROM borrow_records br
                JOIN books b ON br.book_id = b.book_id
                JOIN users u ON br.user_id = u.user_id
                WHERE br.borrow_date BETWEEN ? AND ?";
    } else {
        fputcsv($output, ['Book ID', 'Title', 'Buyer Name', 'Price', 'Purchase Date']);
        $sql = "SELECT p.book_id, b.title, u.name, p.price, 
                       DATE_FORMAT(p.purchase_date, '=\"%Y-%m-%d\"') AS purchase_date
                FROM purchases p
                JOIN books b ON p.book_id = b.book_id
                JOIN users u ON p.user_id = u.user_id
                WHERE p.purchase_date BETWEEN ? AND ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}
?>
