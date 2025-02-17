<!-- register.php
INSERT (password_hash) + (EXIST CHECK::Does the email already exist) 

//Register
	// if i do not use a prepared statement, i need to sanitize the input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
	

    // get current date
    $date = date("Y-m-d H:i:s");

   // hash the password with bcrypt and use a cost of 10
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

 $sql = "INSERT INTO 
    `users` (`name`, `email`, `status`, `date`, `password`) 
    VALUES ('$name', '$email', 0, '$date', '$password')";


    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-primary' role='alert'>
        User $name has been added...
      </div>";
    } else ... -->
<?php
require 'common.php';

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if (emailExists($email)) {
    echo "<div class='alert alert-danger' role='alert'>
        Email already exists
      </div>
      <a href='form.php'>Go back</a>";
    exit;
  } else {
    addUser($name, $email, $password);
    header('location: form.php');
    exit;
  }
}

function addUser($name, $email, $password)
{
  global $conn;
  $hashedPassword = hashPassword($password);
  $query = "INSERT INTO `users` (`name`, `email`, `password`, `status`, `date`) VALUES ('$name', '$email', '$hashedPassword', 1, NOW())";
  $results = mysqli_query($conn, $query);
}
?>