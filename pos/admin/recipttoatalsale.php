<?php
include('config/config.php');
include('config/checklogin.php');
require_once('partials/_head.php');
require "connection.php";

$from = $_POST["from"];
$to = $_POST["to"];



$ret = "SELECT * FROM  `rpos_payments` WHERE `created_at` >= '" . $from . "' AND `created_at` <= '" . $to . "' ORDER BY `created_at` DESC ";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
$total = 0;
while ($payment = $res->fetch_object()) {
    $method = Database::search("SELECT * FROM `payment_method` WHERE `id` = '" . $payment->payment_method_id . "'");
    $method_rs = $method->fetch_assoc();
    $total = $total + $payment->pay_amt;
}
?>
<div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Sales</h5>
                    <span class="h2 font-weight-bold mb-0">Rs.<?php echo $total; ?></span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>