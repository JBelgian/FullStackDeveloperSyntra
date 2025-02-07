<?php
$name = $_POST["firstName"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$age = $_POST["age"];

echo "Hello $name, I received your transmission" . "<br>";
echo "Your email is: $email" . "<br>";
echo "Your phone number is: $phone" . "<br>";
echo "Your age is: $age" . "<br>";

if ($age < 16) {
    echo "You are too young to drink alcohol";
} elseif ($age < 18) {
    echo "You can drink beer";
} else {
    echo "You can drink beer and liquor";
}
