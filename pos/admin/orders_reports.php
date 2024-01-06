<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
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
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8" >
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">

                        <div class="card-header border-0">
                            Orders Records

                        </div>
                        <div class="row">
                            <input type="date" class="form-control w-25 mx-4 " id="date" style="align-items: baseline;">
                            <div class="btn btn-primary " onclick="searchOrder();" >search</div>
                        </div>
                        <div class="table-responsive mt-1" id="search">
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
                                <div >
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Colombo');
                                    $today = date("Y-m-d");
                                    
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
                                            <td>Rs.<?php echo number_format($fect["prod_price"],2)  ?></td>
                                            <td class="text-success"><?php echo $fect["prod_qty"]  ?></td>
                                            <td>Rs.<?php echo number_format($a1["prod_price"],2) ?></td>
                                            <td><?php if ($a1["order_status"] == 1) {
                                                    echo "<span class='badge badge-success'> Paid</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>NO Paid</span>";
                                                } ?></td>
                                            <?php
                                            $date = $a1["created_at"];
                                            $time = $a1["created_time"];
                                            $mysqlDate = date('d/M/Y ', strtotime($date));
                                            $mysqlTime = date('H:i:s ', strtotime($time));
                                            ?>
                                            <td class="text-success"><?php echo $mysqlDate." ".$mysqlTime;?></td>
                                        <?php } ?>
                                </tbody>
                                </div>
                            </table>
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
    <script>
        document.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    
                    searchOrder();
                    
                }
            });
    </script>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
    <script src="script.js"></script>


</body>

</html>