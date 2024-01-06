<?php
require_once('partials/_head.php');

require "connection.php";


$from = $_POST['from'];
$to = $_POST['to'];

if (!empty($from && $to)) {


?>
    <thead class="thead-light">
        <tr>
            <th class="text-success" scope="col"><b>Product Code</b></th>
            <th scope="col"><b>Product Name</b></th>
            <th class="text-success" scope="col"><b>Product Qty</b></th>

        </tr>
    </thead>
    <tbody>
        <?php
        $order = Database::search("SELECT DISTINCT `rpos_products`.`prod_id`, `prod_code`,`prod_name` FROM `rpos_products` INNER JOIN `rpos_orders` ON `rpos_products`.`prod_id`=`rpos_orders`.`prod_id` ");
        $order_rs = $order->num_rows;

        $total = 0;

        for ($i = 0; $i < $order_rs; $i++) {
            $order_data = $order->fetch_assoc();

            $next = Database::search("SELECT sum(`prod_qty`) AS total FROM `rpos_orders` WHERE `prod_id`= '" . $order_data["prod_id"] . "' AND `created_at` >= '" . $from . "' AND `created_at` <= '" . $to . "' AND `order_status` ='1' ORDER BY `prod_qty` ASC");
            $nextdata = $next->fetch_assoc();
            $total = $total + $nextdata["total"];


        ?>

            <tr>
                <th class="text-success" scope="row"><?php echo $order_data["prod_id"]; ?></th>

                <td><?php echo $order_data["prod_name"]; ?></td>
                <td class="text-success text-right"><?php echo $nextdata["total"]; ?></td>


            </tr>
        <?php }
        ?>
        <tr class="mx-4 ">
            <td></td>
            <td></td>

            <td class="text-right font-weight-bold">Total Product: <?php echo $total;  ?></td>

        </tr>
    <?php
} else {
    echo "not found";
}


    ?>
    </tbody>