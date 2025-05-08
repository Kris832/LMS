<?php
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: ../actions/admin_login.php');
exit();
?>
