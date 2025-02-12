<?php
include 'common.php';
include 'assets/header.php';

// index.php - Bestelformulier
session_start();

?>
    <h2>Order Form</h2>
    <form action="orderCreation.php" method="post">
        <table>
            <tr>
                <th>Dish</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($dishes as $dish): ?>
                <tr>
                    <td><?php echo $dish["food"]; ?></td>
                    <td><input type="number" name="order[<?php echo $dish["food"] . "," . $dish["time"]; ?>]" min="0" value="0"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Place order</button>
    </form>

    <a href="overview.php">Show all orders</a>