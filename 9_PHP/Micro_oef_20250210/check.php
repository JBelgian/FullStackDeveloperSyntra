<?php
session_start();

if(isset($_POST['name']) && isset($_POST['age'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    CheckAge();
}

function CheckAge(){
    $drinkType = "";
    $age = (int)$_SESSION['age'];
    if ($age < 16) {
        $drinkType = "Soda";
    } elseif ($age >= 16 && $age < 18) {
        $drinkType = "Beer";
    } else {
        $drinkType = "Liquor & beer";
    }
    $_SESSION['drinkType'] = $drinkType;
}
?>
<br>
<a href="print.php"> Print </a>