<?php
include 'assets/common.php';

// get email and password from form using $_POST
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// check if email exists in the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        // random string to the session token
        $_SESSION['token'] = bin2hex(random_bytes(32));
        header("Location: dashboard.php");
        exit(); // ensure no further code is executed after redirect
    } else {
        header("Location: index.php?error=invalid_password");
        exit();
    }
} else {
    header("Location: index.php?error=email_not_found");
    exit();
}
?>
