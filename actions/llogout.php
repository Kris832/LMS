<?php
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: ../actions/librarian_login.php');
exit();
?>
