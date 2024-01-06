<?php
include('config/config.php');
include('config/checklogin.php');
require_once('partials/_head.php');
require "connection.php";

$from = $_POST["from"];
$to = $_POST["to"];

?>
<table class="table align-items-center table-flush">
    <thead class="thead-light">
        <tr>
            <th class="text-success" scope="col">Payment Code</th>
            <th scope="col">Payment Method</th>
            <th class="text-success" scope="col">Order Code</th>
            <th scope="col">Amount Paid</th>
            <th class="text-success" scope="col">Date Paid</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ret = "SELECT * FROM  `rpos_payments` WHERE `created_at` >= '" . $from . "' AND `created_at` <= '" . $to . "' ORDER BY `created_at` DESC ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($payment = $res->fetch_object()) {
            $method = Database::search("SELECT * FROM `payment_method` WHERE `id` = '" . $payment->payment_method_id . "'");
            $method_rs = $method->fetch_assoc();
        ?>
            <tr>
                <th class="text-success" scope="row">
                    <?php echo $payment->pay_code; ?>
                </th>
                <th scope="row">
                    <?php echo $method_rs["name"]; ?>
                </th>
                <td class="text-success">
                    <?php echo $payment->order_code; ?>
                </td>
                <td>
                    Rs. <?php echo number_format($payment->pay_amt,2) ?>
                </td>
                <td class="text-success">
                    <?php echo date('d/M/Y ', strtotime($payment->created_at)) ?>
                </td>
                <th scope="row">
                    <div class="btn btn-danger p-1" onclick="returnpay(<?php echo $payment->order_code; ?>);"> return</div>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>