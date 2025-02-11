<?php include 'assets/header.php';
include 'common.php'; 
?>

<h1>Following course was added succesfully:</h1>
<div><?php echo $_POST['name']; ?> - €<?php echo $_POST['price']; ?></div>
<a href="addCourseForm.php">Add another course</a>
<a href="courses.php">See all courses</a>

<?php
if (isset($_POST['name']) && isset($_POST['price'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    addCourse($name, $price);
}

function addCourse($name, $price) {
    global $conn;
    $query = "insert into `courses` (`name`, `price`) values ('$name', $price)";
    $results = mysqli_query($conn, $query);
}
?>