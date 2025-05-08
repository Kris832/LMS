<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Manager Registration</title>
    <link rel="stylesheet" href="../css/inventory_register.css">
</head>
<body>

    <div class="register-container">
        <h2>Inventory Manager Registration</h2>
        
        <?php if (isset($_SESSION['register_error'])): ?>
            <p class="error"><?php echo $_SESSION['register_error']; unset($_SESSION['register_error']); ?></p>
        <?php endif; ?>

        <form action="../actions/inventory_register_action.php" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>

        <p>Already registered? <a href="inventory_manager_login.php">Login Here</a></p>
    </div>

</body>
</html>
