<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Reports</title>
    <link rel="stylesheet" href="../css/report.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">Generate Reports</h1>
            <ul class="nav-links">
                <li><a href="../actions/admin_dashboard.php" class="btn">Dashboard</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2>Generate Reports</h2>
        <form action="../actions/export_report.php" method="POST">
            <label for="report_type">Select Report Type:</label>
            <select name="report_type" id="report_type" required>
                <option value="borrow_records">Borrow Records</option>
                <option value="purchase_records">Purchase Records</option>
            </select>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" required>
            
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" required>
            
            <button type="submit">Download Report</button>
        </form>
    </div>

</body>
</html>
