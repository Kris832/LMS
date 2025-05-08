<?php
include '../includes/db_connect.php'; // Include your database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Payment Page</title>
    <link rel="stylesheet" href="../css/payment.css"> <!-- Linking External CSS -->
</head>
<body>

<div class="container">
    <h2>Library Payment Page</h2>
    <form action="../actions/process_payment.php" method="POST">
        <label for="payment_type">Payment Type:</label>
        <select name="payment_type" required>
            <option value="Fine">Overdue Fine</option>
            <option value="Purchase">Book Purchase</option>
        </select>

        <label for="amount">Amount (in ₹):</label>
        <input type="number" name="amount" required>

        <button type="submit">Submit Payment</button>
    </form>
</div>

</body>
</html>
