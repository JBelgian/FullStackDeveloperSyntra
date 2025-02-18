<?php
include 'assets/common.php';
// destroy the session
session_destroy();
// redirect to login page but add a success message
$_SESSION['message'] = 'Successfully logged out.';
header("Location: index.php?success=1");
exit();