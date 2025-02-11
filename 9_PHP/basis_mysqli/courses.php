<?php include 'assets/header.php';
include 'common.php'; 
?>

<h1>Display our courses</h1>

<?php
$query = "SELECT * FROM courses";
$results = mysqli_query($conn, $query);
print_r($results);
echo "<hr>";

if (mysqli_num_rows($results) > 0) {
    foreach ($results as $result) {
        echo $result['name']." - €".$result['price'] . "<hr>";
    }
}
else {
    echo "No results found in the table";
}
?>
<a href="addCourseForm.php">Add another course</a>
<?php include 'assets/footer.php'; ?>