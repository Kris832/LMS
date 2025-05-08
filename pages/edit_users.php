<?php
require '../includes/db_connect.php';

// Check if user ID is provided
if (!isset($_GET['user_id'])) {
    echo "<script>alert('No user ID provided.'); window.location.href='manage_users.php';</script>";
    exit();
}

$user_id = intval($_GET['user_id']);

// Fetch user details
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) === 0) {
    echo "<script>alert('User not found.'); window.location.href='manage_users.php';</script>";
    exit();
}

$user = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $updateQuery = "UPDATE users SET name = '$name', email = '$email', role = '$role' WHERE user_id = $user_id";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('User updated successfully.'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error updating user. Please try again.'); window.location.href='edit_user.php?user_id=$user_id';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/edit_user.css">
</head>
<body>
    <header>
        <h1>Edit User</h1>
    </header>
    
    <form method="POST" class="edit-user-form">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="librarian" <?php echo $user['role'] === 'librarian' ? 'selected' : ''; ?>>Librarian</option>
            <option value="student" <?php echo $user['role'] === 'student' ? 'selected' : ''; ?>>Student</option>
            <option value="inventory_manager" <?php echo $user['role'] === 'inventory_manager' ? 'selected' : ''; ?>>Inventory Manager</option>
        </select>
        
        <button type="submit">Save Changes</button>
        <a href="manage_users.php" class="cancel-btn">Cancel</a>
    </form>
</body>
</html>
