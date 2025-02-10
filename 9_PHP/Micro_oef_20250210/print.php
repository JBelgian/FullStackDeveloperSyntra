<?php
session_start();
include 'common.php';

if(isset($_SESSION['name']) && isset($_SESSION['age']) && isset($_SESSION['drinkType']))
{
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $drinkType = $_SESSION['drinkType'];
    saveToLogFile($name, $age, $drinkType);
}

//create a comma seperated value
function saveToLogFile ($name, $age, $drinkType){
    //open or create file to write or append to it
    $file = fopen('log.txt','a');

    //provide a date object
    $currentdate = date('Y-m-d H:i:s');

    //string
    $string = $currentdate.','.$age.','.$name.','.$drinkType."\r\n";

    //final write operation
    fwrite($file, $string);

    //close file
    fclose($file);
}

echo showBeDate()."<hr>";