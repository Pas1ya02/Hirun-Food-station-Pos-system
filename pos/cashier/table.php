<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="./OSS Restaurant System_files/cus_css.css">

    <script src="./OSS Restaurant System_files/jquery-3.5.1.js"></script>
    <script src="./OSS Restaurant System_files/jquery.dataTables.min.js"></script>
    <script src="./OSS Restaurant System_files/dataTables.bootstrap4.min.js"></script>
    <!-- <link rel="stylesheet" href="./OSS Restaurant System_files/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="./OSS Restaurant System_files/dataTables.bootstrap4.min.css"> -->

    <link rel="stylesheet" href="./OSS Restaurant System_files/sweetalert2.min.css">
    <script src="./OSS Restaurant System_files/sweetalert2.min.js"></script>
    <!-- 
    <link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.css">
   <link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.min.css"> -->
    <?php require_once('partials/_head.php'); ?>
</head>
<?php
session_start();
include('config/config.php');
// include('config/checklogin.php');

require "connection.php";

require_once('partials/_analytics.php');

if (isset($_SESSION["staff"])) {
    $status = $_SESSION["staff"]["staff_id"];
    $staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
    $staff = $staff_name->fetch_assoc();



?>

    <body>
        <!-- Sidenav -->

        <!-- Main content -->
        <div class="main-content">
            <!-- Top navbar -->


            <!-- Header -->

            <!-- Page content -->

            <body>







                <table style="width: 100%; height: 100vh;">
                    <tbody>
                        <tr style="height: 70px;">
                            <td colspan="2" style="background-color: black; padding-top: 5px; padding-left: 10px; padding-bottom: 5px;">

                                <table style="color: white;">
                                    <tbody>
                                        <?php

                                        date_default_timezone_set('Asia/Colombo');
                                        ?>
                                        <tr>
                                            <div id="ocl">
                                                <td>System ID<br><input name="bill_id" type="text" class="form-control form-control-sm" id="bill_id" value="" readonly=""></td>
                                            </div>
                                            <td class="pl-2">user<br><input type="text" class="form-control form-control-sm" readonly="" value="<?php echo $staff["staff_name"] ?>"></td>
                                            <td class="pl-2">Start Time<br><input type="text" class="form-control form-control-sm" readonly="" value="<?php echo date("h:i:s A", time()); ?>"></td>
                                            <!-- <td class="pl-2">&nbsp;<br><a href="https://onlinesoftwaresolution.com/restaurant/dashboard" class="btn btn-sm btn-secondary">Exit POS</a></td> -->
                                            <td class="pl-2">&nbsp;<br><a href="logout.php" class="btn btn-sm btn-danger">Logout</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </td>

                            <td rowspan="2" valign="top" style="width: 25%;">

                                <div class="cat-div">
                                    <?php

                                    $catergory_rs = Database::search("SELECT * FROM `rpos_catergory`");
                                    $row = $catergory_rs->num_rows;

                                    ?>
                                    <div class="btn btn-dark w-100 p-3 text-warning"" onClick=" filte_cat('all');"><i class="ni ni-tv-2 text-warning"></i> All Item's</div>
                                    <?php
                                    for ($i = 0; $i < $row; $i++) {
                                        $data = $catergory_rs->fetch_assoc();


                                    ?>

                                        <div class="btn btn-light w-100 mt-1 p-3 text-dark" style=" text-transform: uppercase;" onClick="filte_cat('<?php echo $data['id']; ?>');"><?php echo $data['name']; ?></div>
                                    <?php
                                    }
                                    ?>
                                    <!-- <div class="cat-sub" onClick="filte_cat('21');">Beef</div>
						    <div class="cat-sub" onClick="filte_cat('2');">Bite & Snack</div>
						    <div class="cat-sub" onClick="filte_cat('26');">Breakfast </div>
						    <div class="cat-sub" onClick="filte_cat('24');">Cake</div>
						    <div class="cat-sub" onClick="filte_cat('3');">Chicken</div>
						    <div class="cat-sub" onClick="filte_cat('4');">Chopsuey Rice / Noodles</div>
						    <div class="cat-sub" onClick="filte_cat('5');">Cold Beverage</div>
						    <div class="cat-sub" onClick="filte_cat('6');">Cuttle Fish</div>
						    <div class="cat-sub" onClick="filte_cat('7');">Desserts</div>
						    <div class="cat-sub" onClick="filte_cat('19');">Dhal Curry</div>
					    	<div class="cat-sub" onClick="filte_cat('23');">Flower Deco</div>
						    <div class="cat-sub" onClick="filte_cat('8');">Fresh From The Ocean</div>
						    <div class="cat-sub" onClick="filte_cat('9');">Fresh Fruit Juice</div>
						    <div class="cat-sub" onClick="filte_cat('10');">Freshly Made Salads</div>
						    <div class="cat-sub" onClick="filte_cat('11');">Hot Beverage</div>
						    <div class="cat-sub" onClick="filte_cat('25');">Ingredianc</div>
						    <div class="cat-sub" onClick="filte_cat('22');">Liq</div>
						    <div class="cat-sub" onClick="filte_cat('20');">Lunch Srilankan</div>
						    <div class="cat-sub" onClick="filte_cat('12');">Medium Prawns</div>
						    <div class="cat-sub" onClick="filte_cat('13');">Mix Grill</div>
						    <div class="cat-sub" onClick="filte_cat('14');">Omelets (Eggs 03 Nos)</div>
						    <div class="cat-sub" onClick="filte_cat('15');">Pork</div>
						    <div class="cat-sub" onClick="filte_cat('16');">Rice / Noodles</div>
						    <div class="cat-sub" onClick="filte_cat('17');">Soft Drinks</div>
						    <div class="cat-sub" onClick="filte_cat('18');">Soup</div> -->
                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="width: 30%; background-color: #EEEEEE;">

                                <table style="width: 100%; margin-bottom: 5px; margin-top: 10px;">
                                    <tbody>

                                        <tr>
                                            <th colspan="2">
                                            </th>
                                        </tr>
                                        <script>
                                            window.addEventListener("load", function() {
                                                document.getElementById("table").focus();

                                            });
                                        </script>

                                        <tr>
                                            <th scope="col" style="width: 30%;"><input name="table" type="text" class="form-control form-control-sm" id="table" placeholder="Table" list="table_list" autocomplete="off" onkeyup="select_qty1(event);"></th>
                                            <th scope="col" style="width: 50%;"><input name="product_barcode" type="text" class="form-control form-control-sm" id="product_barcode" placeholder="Product Code" autocomplete="" list="product_list" onkeyup="select_qty(event);"></th>
                                            <th scope="col" style="width: 20%;"><input name="sale_qty" type="tel" class="form-control form-control-sm" id="sale_qty" placeholder="QTY" autocomplete="" onkeyup="JavaScript:save_list1(event,this.value);"></th>
                                        </tr>

                                    </tbody>
                                </table>



                                <div class="table-responsive" id=''>
                                    <table class="table table-bordered" style="font-size: 14px;">
                                        <tbody id='table_view'>

                                        </tbody>
                                    </table>
                                </div>



                            </td>
                            <td valign="top">



                                <div class="product-div " id="product_display_div">
                                    <?php

                                    $product_rs = Database::search("SELECT* FROM `rpos_products`");
                                    $product_num = $product_rs->num_rows;

                                    for ($x = 0; $x < $product_num; $x++) {
                                        $product_data = $product_rs->fetch_assoc();
                                        $p_img = $product_data["prod_img"];

                                    ?>


                                        <div class="product-sub" onclick="JavaScript:list_value_send(<?php echo $product_data['prod_id']; ?> );">
                                            <div class="product_price bg-dark"><?php echo $product_data['prod_price']; ?></div>
                                            <img src="/pos/admin/assets/img/products/<?php echo $p_img ?>" style="height: 100px; object-fit: cover;">
                                            <div class="product-name "><?php echo $product_data['prod_name']; ?></div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>

                            </td>

                        </tr>
                        <tr style="height: 100px; height: 100px; border-top: 5px solid #000000; border-bottom: 5px solid #000000;">

                            <td align="right" valign="middle" class="bg-dark" id='total_amount' style=" color: white; padding-right: 20px;">
                                <h1 class="" style=" font-weight:bold; color:tomato">0.00</h1>
                                <h5 style="color: white;">0 Item(s)</h5>
                            </td>
                            <td colspan="2" valign="top">
                                <table style="width: 100%; height: 100%;">
                                    <tbody>
                                        <tr align="center">
                                            <td align="center" valign="middle" class="bg-success" style=" color: white; width: auto; cursor: pointer;" onclick="diningBill();">
                                                <h4 style="margin: 0; padding: 0;">Dining</h4>
                                                <h6 style="margin: 0; padding: 0;">(F8)</h6>
                                            </td>
                                            <?php
                                            $re = Database::search("SELECT * FROM `rpos_dining`");
                                            $rs = $re->num_rows;
                                            ?>
                                            <td align="center" valign="middle" class="bg-primary " style="  width: 16.6%; cursor: pointer;width:auto;" onclick="window.location='pendingtable.php';">
                                                <h4 style="margin: 0; padding: 0;">Pending<span id="pendingcount"><span style="background-color: white; color: black; padding: 10px; border-radius: 10%; width: 50px; height: 50px;"><?php echo $rs ?></span><span></span></h4>
                                            </td>
                                            <td align="center" valign="middle" class="bg-secondary" style="  width: 16.6%; cursor: pointer;width:auto;" onClick="window.location='dayEntry.php';">
                                                <h4 style="margin: 0; padding: 0;">Day Summery</h4>
                                            </td>
                                            <td align="center" valign="middle" class="bg-danger" style="  width: 16.6%; cursor: pointer;width:auto;" onclick="bill_claer();" onkeyup="JavaScript:bill_claer(event);">
                                                <h4 style="margin: 0; padding: 0;">New Bill</h4>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <input name="update" type="hidden" id="update" value="0">

        <datalist id="table_list">
            <?php
            $product_rs2 = Database::search("SELECT* FROM `rpos_table`");
            $product_num2 = $product_rs2->num_rows;
            for ($j = 0; $j < $product_num2; $j++) {
                $product_data2 = $product_rs2->fetch_assoc();
            ?>
                <option value="<?php echo $product_data2['table_id']; ?>">
                    <?php echo $product_data2['table_id']; ?> - <?php echo $product_data2['table_name']; ?>
                </option>
            <?php
            }
            ?>
        </datalist>

        <datalist id="product_list">
            <?php
            $product_rs1 = Database::search("SELECT* FROM `rpos_products`");
            $product_num1 = $product_rs1->num_rows;
            for ($x = 0; $x < $product_num1; $x++) {
                $product_data1 = $product_rs1->fetch_assoc();
            ?>
                <option value="<?php echo $product_data1['prod_id']; ?>">
                    <?php
                    $cat = Database::search("SELECT*FROM `rpos_catergory` WHERE `id`= '" . $product_data1['rpos_catergory_id'] . "'");
                    $cat_data = $cat->fetch_assoc();
                    ?>
                    <?php echo $product_data1['prod_id']; ?> - <?php echo $product_data1['prod_name']; ?> |<?php echo $cat_data['name']; ?>
                </option>
            <?php
            }
            ?>
        </datalist>

        <script>
            function select_qty1(event) {


                if (event.keyCode == 13) {
                    table_load();
                    orderw();

                    document.getElementById('product_barcode').select();
                }
            }

            function select_qty(event) {

                if (event.keyCode == 13) {
                    document.getElementById('sale_qty').value = "1";
                    document.getElementById('sale_qty').select();
                }
            }


            function diningBill() {

                var bill_id = document.getElementById('bill_id').value;
                window.location = "bill_payment.php?bill_id=" + bill_id;
            }

            window.addEventListener("keyup", function(event) {

                //console.log(event.keyCode);
                if (event.keyCode == 119) {
                    diningBill();
                }

                if (event.keyCode == 27) {
                    window.location = "dashboard.php";
                }

            });

            function list_value_send(product_barcode, table) {
                document.getElementById('product_barcode').value = product_barcode;

                document.getElementById('sale_qty').value = "1";
                document.getElementById('sale_qty').select();
            }

            function table_load() {
                var table = document.getElementById('table').value;
                var form = new FormData();
                form.append('table', table);
                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var t = r.responseText;
                        if (t == "ok") {
                            alert("TABLE IS NOT FOUND!");
                            document.getElementById('table').value = "";
                            document.getElementById('table').select();
                        } else {
                            document.getElementById('table_view').innerHTML = t;
                        }

                    }
                }
                r.open("POST", "tableload.php", true);
                r.send(form);

                setInterval(function table_load() {

                        let bill_id = document.getElementById('bill_id').value;

                        var f = new FormData();
                        f.append('bill_id', bill_id);

                        var r = new XMLHttpRequest();
                        r.onreadystatechange = function() {
                            if (r.readyState == 4) {
                                var t = r.responseText;
                                document.getElementById('total_amount').innerHTML = t;

                            }
                        }
                        r.open("POST", "total_cal_pos.php", true);
                        r.send(f);

                    },
                    1000 / 2);

            }

            function pending_cal() {
                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var t = r.responseText;
                        document.getElementById('pendingcount').innerHTML = t;
                        
                    }
                }
                r.open("POST", "pendingcount.php", true);
                r.send();
            }

            setInterval(pending_cal, 1500);

            function orderw() {
                var table = document.getElementById('table').value;
                var form = new FormData();
                form.append('table', table);
                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var t = r.responseText;
                        document.getElementById('bill_id').value = t;
                        document.getElementById('sale_qty').value = "";
                        document.getElementById('product_barcode').select();
                        document.getElementById('product_barcode').value = "";
                    }

                }
                r.open("POST", "olc.php", true);
                r.send(form);
            }
        </script>

        <script src="script.js"></script>


        <!-- test1 -->
        <!-- Argon Scripts -->
        <?php
        require_once('partials/_scripts.php');
        ?>
    </body>

</html>
<?php
} else {
    include '404.php';
}
