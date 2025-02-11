<!-- login.php
SELECT / password_verify()
Make a SESSION['token'] (login) 

//redirect after login to dashboard
header('location: dashboard.php');

//Password verify
if (password_verify($password,$passwordRow)) {
    $_SESSION['name'] = $row['name'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['token'] = bin2hex(random_bytes(5));
}

-->

<?php
require 'common.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (emailExists($email)) {
        $query = "select `password` from `users` where `email` = '$email'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['token'] = bin2hex(random_bytes(5));
            header('location: dashboard.php');
            exit;
        } else {
            echo "<div class='alert alert-primary' role='alert'>
                Wrong password
                </div>
                <a href='form.php'>Go back</a>";
            exit;
        }
    } else {
        echo "<div class='alert alert-primary' role='alert'>
            User not found in database
            </div>
            <a href='form.php'>Go back</a>";
        exit;
    }
}
