<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    saveToLogFile($name, $email, $phone);
    echo 'Your data has been saved';
}

// create a comma seperate value

function saveToLogFile ($name, $email, $phone) {
    // open or create file to write or append to it
    $file = fopen('log.txt', 'a');

    // provide a date object
    $currentDate = date('Y-m-d H:i:s');

    // string
    $string = $currentDate . ',' . $name . ',' . $email . ',' . $phone . "\r\n";

    // write to file
    fwrite($file, $string);
    fclose($file);
}

// always use this in a footer (c) <?php echo date('Y');
?>