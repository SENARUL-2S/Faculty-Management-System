<?php
session_start();
session_unset();
session_destroy();

// Redirect to dashboard (or homepage)
header("Location: dashboard.php");
exit;
?>
