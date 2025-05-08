<?php
session_start();
if (isset($_SESSION['inventory_manager_id'])) {
    header("Location: ../pages/inventory_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Login</title>
    <link rel="stylesheet" href="../css/ilogin.css">
</head>
<body>
    <div class="login-container">
        <h2>Inventory Manager Login</h2>
        <?php if (isset($_SESSION['login_error'])): ?>
            <p class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
        <?php endif; ?>
        <form action="../actions/inventory_manager_login_action.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        

    </div>
</body>
</html>
