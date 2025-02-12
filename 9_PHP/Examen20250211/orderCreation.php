<?php
include 'common.php';
include 'assets/header.php';

if ($_POST) {
    $orderedFood = $_POST["order"];
    foreach ($orderedFood as $dishTime => $quantity) {
        if ($quantity > 0) {
            list($dish, $time) = explode(',', $dishTime);
            $expectedTime = calcExpectedTime($time, $quantity);
            echo "<div class='dish-container'>
            <div class='dish-name'> Dish: $dish 
            <div class='dish-details'> <div class='dish-quantity'>Quantity: $quantity | </div>
            <div class='dish-time'>| Expected Time: $expectedTime min<br> </div>
            </div></div></div>";

            saveToOrdersFile($dish, $quantity, $expectedTime);
        }
    }
}

function saveToOrdersFile($dish, $quantity, $expectedTime)
{
    // open or create file to write or append to it
    $file = fopen('orders.txt', 'a');
    $string = $dish . "," . $quantity . "," . $expectedTime . "\r\n";
    // write to file
    fwrite($file, $string);
    fclose($file);
}

function checkOrdersAmount()
{
    $file = fopen('orders.txt', 'r');
    $lines = array();
    while (!feof($file)) {
        $lines[] = fgets($file);
    }
    fclose($file);
    $amountLines = count($lines);
    return $amountLines;
}

function calcExpectedTime($time, $quantity)
{
    if (checkOrdersAmount() > 3) {
        $expectedTime = $time * $quantity + 4;
    } else if (checkOrdersAmount() > 5) {
        $expectedTime = $time * $quantity + 8;
    } else if (checkOrdersAmount() > 10) {
        $expectedTime = $time * $quantity + 16;
    } else {
        $expectedTime = $time * $quantity;
    }
    return $expectedTime;
}
?>

<a href="form.php">Create another order</a>