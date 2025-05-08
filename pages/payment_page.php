<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['book_id']) || !isset($_GET['price'])) {
    header('Location: ../pages/purchase_books.php');
    exit();
}

$book_id = intval($_GET['book_id']);
$price = floatval($_GET['price']); // Safely retrieve the price from the query string
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dummy Payment</title>
    <link rel="stylesheet" href="../css/payment_page.css">
</head>
<body>
    <div class="payment-container">
        <h1>Payment Gateway</h1>
        <form action="../actions/process_payment.php" method="POST">
            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>"> <!-- Include the price -->
            <label for="card_number">Card Number:</label>
            <input type="text" name="card_number" id="card_number" required>
            
            <label for="expiry_date">Expiry Date:</label>
            <div class="select-container">
                <select id="month" name="month" required>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select id="year" name="year" required>
                    <script>
                        let currentYear = new Date().getFullYear();
                        let startYear = currentYear - 50; // 50 years back
                        let endYear = currentYear + 10; // 10 years ahead
                        for (let i = endYear; i >= startYear; i--) {
                            document.write(`<option value="${i}">${i}</option>`);
                        }
                    </script>
                </select>
            </div>
            
            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" id="cvv" required>
            
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
