<?php

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'] ?? '0000';
?>

<form action="update.php" method="post">
    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="text" name="email" value="<?php echo $email; ?>">
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <button type="submit">Submit</button>
</form>