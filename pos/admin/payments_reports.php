<?php
session_start();

include('config/config.php');
include('config/checklogin.php');

check_login();

require_once('partials/_head.php');
require "connection.php";
?>
<script src="assets/js/swal.js"></script>

<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">

                    <div class="row" id="total">

                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Sales</h5>
                                            <span class="h2 font-weight-bold mb-0">Rs.0</span>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            Payment Reports
                        </div>
                        <div class="row">
                            <input type="text" class="form-control w-25 mx-4" id="ordercode" placeholder="OrderCode">
                            <div class="btn btn-primary " onclick="findcode();">Find</div>
                        </div>
                        <div class="row mt-3 mx-3">
                            <div class="mt-2">From:</div> <input type="date" class="form-control w-25 mx-2 " placeholder="from" id="from" style="align-items: baseline;">
                            <div class="mt-2">To:</div><input type="date" class="form-control w-25 mx-2 " placeholder="to" id="to" style="align-items: baseline;">
                            <div class="btn btn-primary " onclick="paymentdatefilter();">search</div>
                        </div>
                        <div class="table-responsive mt-2" id="paymentview">
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
                                    date_default_timezone_set('Asia/Colombo');
                                    $date = date('Y-m-d');
                                    $ret = "SELECT * FROM  rpos_payments WHERE `created_at`='".$date."' ORDER BY `created_at` DESC ";
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
                                            <td id="amount">
                                                Rs. <?php echo number_format($payment->pay_amt, 2) ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <?php
        require_once('partials/_footer.php');
        ?>
    </div>
    </div>
    <script src="script.js"></script>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>

</body>

</html>