<?php
include 'assets/common.php';

// get name, email and password from form using $_POST
// if i do not use a prepared statement, i need to sanitize the input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// check if email exists in the database
if (checkEmail($email)) {
    echo "Email already exists";
    exit;
}

// hash the password using Bcrypt with cost factor 10
$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

// insert the user into the database with status and current timestamp
$sql = "INSERT INTO users (name, email, password, status, date) 
        VALUES ('$name', '$email', '$hashedPassword', 1, NOW())";

if(mysqli_query($conn, $sql)) {
    header("Location: index.php?success=1");
    exit(); // ensure no further code is executed after redirect
} else {
    echo "Error: " . mysqli_error($conn);
    exit(); // ensure no further code is executed after displaying error
}