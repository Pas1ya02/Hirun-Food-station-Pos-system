<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
require "connection.php";

?>

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
                 $d = 0;
                      $order = Database::search("SELECT * FROM `rpos_orders`");
                      $order_num = $order->num_rows;
                      for ($x = 0; $x < $order_num; $x++) {
                        $order_fetch = $order->fetch_assoc();
                        $order_date = $order_fetch["created_at"];
                        $or_date = explode(" ", $order_date);
                        $pdate = $or_date[0];

                        if ($today == $pdate) {
                          $b = Database::search("SELECT COUNT(DISTINCT `order_code`) AS num_unique_order_codes FROM `rpos_orders` WHERE `created_at`='" . $today . "' ");
                          $br = $b->fetch_assoc();


                          $c = $c + $order_fetch["prod_qty"];

                          $d = $d + $order_fetch["prod_price"];
                        }
                      }
            <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">

          <!-- Card stats -->

          <div class="row">
            <div class="col-xl-3 col-lg-6">

              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">

                  <div class="row">
                    <div class="col">
                      <?php
                      $a = 0;
                      $br = 0;
                      date_default_timezone_set('Asia/Colombo');
                      $today = date("Y-m-d");
                      $invoice = Database::search("SELECT * FROM `rpos_payments`");
                      $invoice_num = $invoice->num_rows;
                      for ($x = 0; $x < $invoice_num; $x++) {
                        $invoice_fetch = $invoice->fetch_assoc();
                        $invoice_data = $invoice_fetch["created_at"];
                        $real_date = explode(" ", $invoice_data);
                        $pdate = $real_date[0];
                        if ($today == $pdate) {
                          $a = $a + 1;
                        }
                      }
                      $c = 0;
                     ?>

                      <h5 class="card-title text-uppercase text-muted mb-0">invoice</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $a; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $c; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-utensils"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Orders</h5>
                      <?php
                      if ($br == null) {
                      ?>
                        <span class="h2 font-weight-bold mb-0">0</span>

                      <?php
                      } else {

                      ?>
                        <span class="h2 font-weight-bold mb-0"><?php echo $br["num_unique_order_codes"];  ?></span>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>

                      <?php
                      $f = Database::search("SELECT sum(`pay_amt`) AS total FROM `rpos_payments` WHERE `created_at` = '" . $today . "'");
                      $f_fetch = $f->fetch_assoc();
                      if ($f_fetch == null && $f_fetch["total"] == 0) {
                      ?>
                        <span class="h2 font-weight-bold mb-0">Rs. 0.00</span>

                      <?php

                      } else {
                      ?>
                        <span class="h2 font-weight-bold mb-0">Rs.<?php echo number_format($f_fetch["total"] )?></span>


                      <?php

                      }
                      ?>

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

    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">


                  <h3 class="mb-0">Recent Orders</h3>
                </div>
                <div class="col text-right">
                  <a href="orders_reports.php" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="text-success" scope="col"><b>Code</b></th>
                    <th class="text-success" scope="col"><b>Product</b></th>
                    <th scope="col"><b>Unit Price</b></th>
                    <th class="text-success" scope="col"><b>Qty</b></th>
                    <th scope="col"><b>Total</b></th>
                    <th scop="col"><b>Status</b></th>
                    <th class="text-success" scope="col"><b>Date</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = Database::search("SELECT * FROM  `rpos_orders` INNER JOIN `rpos_products` ON `rpos_orders`.`prod_id`=`rpos_products`.`prod_id` WHERE `rpos_orders`.`created_at` = '".$today."' ORDER BY `rpos_orders`.`created_time` DESC LIMIT 7 ");
                  $num_r = $ret->num_rows;

                  for ($x = 0; $x < $num_r; $x++) {
                    $fect = $ret->fetch_assoc();
                    $a = Database::search("SELECT * FROM `rpos_orders` where `order_id` = '" . $fect["order_id"] . "'");
                    $a1 = $a->fetch_assoc();

                  ?>
                    <tr>
                      <th class="text-success" scope="row"><?php echo $fect["order_code"]; ?></th>
                      <td class="text-success"><?php echo $fect["prod_name"] ?></td>
                      <td>Rs.<?php echo number_format($fect["prod_price"],2)   ?></td>
                      <td class="text-success"><?php echo $fect["prod_qty"]  ?></td>
                      <td>Rs.<?php echo number_format($a1["prod_price"],2) ?></td>
                      <td><?php if ($a1["order_status"] == 2) {
                            echo "<span class='badge badge-danger'> Paid</span>";
                          } else {
                            echo "<span class='badge badge-success'>Paid</span>";
                          } ?></td>
                      <?php
                      date_default_timezone_set('Asia/Colombo');
                      $time = $a1["created_at"];
                      $mysqltime = date('Y-m-d', strtotime($time));
                      ?>
                      <td class="text-success"><?php echo $mysqltime; ?></td>
                    <?php } ?>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Payments</h3>
                </div>
                <div class="col text-right">
                  <a href="payments_reports.php" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="text-success" scope="col"><b>Code</b></th>
                    <th scope="col"><b>Amount</b></th>
                    <th class='text-success' scope="col"><b>Order Code</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM `rpos_payments` WHERE `rpos_payments`.`created_at` = '".$today."' ORDER BY `rpos_payments`.`created_time` DESC LIMIT 7 ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($payment = $res->fetch_object()) {
                  ?>
                    <tr>
                      <th class="text-success" scope="row">
                        <?php echo $payment->pay_code; ?>
                      </th>
                      <td>
                        Rs.<?php echo number_format($payment->pay_amt,2) ?>
                      </td>
                      <td class='text-success'>
                        <?php echo $payment->order_code; ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php require_once('partials/_footer.php'); ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script src="bootstrap.bundle.js"></script>
</body>

</html>