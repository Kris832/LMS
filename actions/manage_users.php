<?php
require '../includes/db_connect.php';

// Handle user deletion
if (isset($_GET['delete'])) {
    $user_id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM users WHERE user_id = $user_id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('User deleted successfully.'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.'); window.location.href='manage_users.php';</script>";
    }
}

// Fetch all users
$sql = "SELECT user_id, name, email, role FROM users where role IN ('student', 'librarian', 'inventory_manager')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../css/manage_users.css">
</head>
<body>
    <header>
        <h1>Manage Users</h1>
    </header>

    <section class="add-user-section">
        <a href="../pages/register.html" class="add-user-btn">Add New User</a>
        <a href="../pages/librarian_dashboard.html" class="dashboard-btn">Dashboard</a>
    </section>

    <section class="user-list-section">
        <h2>User List</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td>
                                <a href="../pages/edit_users.php?user_id=<?php echo $row['user_id']; ?>" class="edit-btn">Edit</a>
                                <a href="manage_users.php?delete=<?php echo $row['user_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
