<?php
session_start();


// Destroy the session
session_destroy();

// Redirect to the login page after logout
echo '<script type="text/javascript">
window.alert("Logout successfully!");
window.location.href = "login.php";</script>';

?>
