<?php 
include 'assets/header.php';
?>

    <h2>Orders Overview</h2>

    <table>
        <tr>
            <th>Dish</th>
            <th>Quantity</th>
            <th>Expected Time</th>
        </tr>
        <?php
        $file = fopen('orders.txt', 'r');
        while (!feof($file)) {
            $line = fgets($file);
            if ($line != '') {
                list($dish, $quantity, $expectedTime) = explode(',', $line);
                echo '<tr>';
                echo '<td>' . $dish . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td>' . $expectedTime . '</td>';
                echo '</tr>';
            }
        }
        fclose($file);
        ?>
    </table>

    <a href="form.php">Back to order form</a>
