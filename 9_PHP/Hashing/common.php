<!-- common.php
Helper -> if loggediIn() true -->

<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'schooldb';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo "Error connecting to database";
    exit;
}

function loggedIn()
{
    if (!isset($_SESSION['name'])) {
        header('location: form.php');
        exit;
    }
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
}

function emailExists($email)
{
    global $conn;
    $query = "select `email` from `users` where `email` = '$email'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        return true;
    } else {
        return false;
    }
}


