<?php

require "connection.php";
require_once('partials/_head.php');

$from = $_POST["from"];
$to = $_POST["to"];


?>

<thead class="thead-light">
    <tr>
        <th class="text-success" scope="col"><b>Invoice</b></th>
        <th scope="col"><b>Date</b></th>
        <th class="text-success" scope="col"><b>Product Name</b></th>
        <th class="text-success" scope="col"><b> Qty</b></th>
        <th class="text-success text-center" scope="col"><b>Sale</b></th>

    </tr>
</thead>
<tbody>

    <?php
    $order = Database::search("SELECT * FROM `rpos_orders` WHERE `created_at` >= '" . $from . "' AND `created_at` <= '" . $to . "' AND `order_status`='1' ");
    $order_rs = $order->num_rows;
    $total = 0;



    for ($i = 0; $i < $order_rs; $i++) {
        $order_data = $order->fetch_assoc();
        $total = $total + $order_data["prod_price"];
        $next = Database::search("SELECT*FROM `rpos_products` WHERE `prod_id`='" . $order_data["prod_id"] . "' ");
        $nextdata = $next->fetch_assoc();

    ?>

        <tr>
            <th class="text-success" scope="row"><?php echo $order_data["order_code"]; ?></th>

            <td><?php echo $order_data["created_at"]; ?></td>
            <td class="text-success"><?php echo $nextdata["prod_name"]; ?></td>
            <td class="text-success"><?php echo $order_data["prod_qty"]; ?></td>
            <td class="text-success text-right"><?php echo $order_data["prod_price"]; ?></td>


        </tr>

    <?php } ?>
    <tr class="mx-4 font-weight-bold">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right">Total Sale: <?php echo $total;  ?>LKR</td>

    </tr>

</tbody>