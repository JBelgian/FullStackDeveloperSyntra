<?php include 'assets/header.php';
include 'common.php'; 
?>

<h1>Add a course</h1>
<form action="confirmAddCourse.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="price" placeholder="Price">
    <button type="submit">Add course</button>
</form>