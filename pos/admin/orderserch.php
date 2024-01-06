<?php
include('config/config.php');
require "connection.php";
require_once('partials/_head.php');
$date = $_POST["date"];

$order = Database::search("SELECT * FROM  `rpos_orders` WHERE `created_at` = '" . $date . "' ");
$order_rs = $order->num_rows;

$b = Database::search("SELECT COUNT(DISTINCT `order_code`) AS num_unique_order_codes FROM `rpos_orders` WHERE `created_at`='".$date."' ");
$br=$b->fetch_assoc();

$c = Database::search("SELECT COUNT(DISTINCT `order_code`) AS num_unique_order_codes FROM `rpos_orders` WHERE `created_at`='".$date."' AND `order_status`='1' ");
$cr=$c->fetch_assoc();

?>
<div class="row mx-2">
<div class="mx-3 text-warning">Order Count =<?php echo $br["num_unique_order_codes"]; ?> </div>
<div class="mx-3 text-warning">Paid Orders =<?php echo $cr["num_unique_order_codes"]; ?> </div>
</div>
<table class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-success" scope="col">Code</th>
            <th scope="col">Product</th>
            <th class="text-success" scope="col">Unit Price</th>
            <th scope="col">Qty</th>
            <th class="text-success" scope="col">Total Price</th>
            <th scope="col">Status</th>
            <th scop="col">Date</th>
        </tr>
    </thead>
    <div>
        <?php
        for ($i = 0; $i < $order_rs; $i++) {
            $orderdata = $order->fetch_assoc();

            $product = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id`='" . $orderdata["prod_id"] . "'");
            $product_data = $product->fetch_assoc();


        ?>
            <tbody>
                <tr>
                    <th class="text-success" scope="row"><?php echo   $orderdata["order_code"]; ?></th>
                    <td class="text-success"><?php echo $product_data["prod_name"] ?></td>
                    <td>Rs.<?php echo number_format($product_data["prod_price"],2)  ?></td>
                    <td class="text-success"><?php echo $orderdata["prod_qty"]  ?></td>
                    <td>Rs.<?php echo number_format($orderdata["prod_price"],2) ?></td>
                    <td><?php if ($orderdata["order_status"] == 2) {
                            echo "<span class='badge badge-danger'>Paid</span>";
                        } else {
                            echo "<span class='badge badge-success'>Paid</span>";
                        } ?></td>

                    <td class="text-success"><?php echo  $orderdata["created_at"]; ?></td>

            </tbody>

        <?php } ?>

    </div>
</table>