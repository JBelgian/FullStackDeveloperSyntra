<!-- form.php
login (user, pass)
register (name, user, pass) 
-->

<?php

?>

<h1>Login</h1>
<form action="login.php" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

<h1>Register</h1>
<form action="register.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>