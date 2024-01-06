<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
require "connection.php";
?>
<script src="table2excel.js"></script>
<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->

        <!-- Header -->

        <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">

                    <!-- Card stats -->

                    <div class="row">



                        < </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--7">
                <div class="row mt-5">
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Recent Products</h3>
                                        <div class="row mt-1 mx-1 ">
                                            <div class="mt-2">From:</div> <input type="date" class="form-control w-25 mx-2 " placeholder="from" id="from" style="align-items: baseline;">
                                            <div class="mt-2">To:</div><input type="date" class="form-control w-25 mx-2 " placeholder="to" id="to" style="align-items: baseline;">
                                            
                                            <div class="btn btn-primary " onclick="searchproduct();">search</div>
                                            <div class="btn btn-success " onclick="excel();">export</div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush" id="search">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-success" scope="col"><b>Product Code</b></th>
                                            <th scope="col"><b>Product Name</b></th>
                                            <th class="text-success" scope="col"><b>Product Qty</b></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $order = Database::search("SELECT DISTINCT `rpos_products`.`prod_id`, `prod_code`,`prod_name` FROM `rpos_products` INNER JOIN `rpos_orders` ON `rpos_products`.`prod_id`=`rpos_orders`.`prod_id`");
                                        $order_rs = $order->num_rows;
                                        $total = 0;


                                        for ($i = 0; $i < $order_rs; $i++) {
                                            $order_data = $order->fetch_assoc();

                                            $next = Database::search("SELECT sum(`prod_qty`) AS total FROM `rpos_orders` WHERE `prod_id`= '" . $order_data["prod_id"] . "' AND `order_status` ='1' ORDER BY `prod_qty` ASC");
                                            $nextdata = $next->fetch_assoc();


                                        ?>
                                            <tr>
                                                <th class="text-success" scope="row"><?php echo $order_data["prod_id"]; ?></th>

                                                <td><?php echo $order_data["prod_name"]; ?></td>
                                                <td class="text-success"><?php echo $nextdata["total"]; ?></td>


                                            </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>
    <Script>
        function excel() {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("table.table"));
        }


        document.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchproduct();
            }

        });
        
    </Script>
    <script src="script.js"></script>

    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>

</body>