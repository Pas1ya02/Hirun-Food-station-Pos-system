<?php
session_start();
include('config/config.php');
// include('config/checklogin.php');

require "connection.php";

require_once('partials/_analytics.php');
date_default_timezone_set('Asia/Colombo');

if (isset($_SESSION["staff"])) {
  $status = $_SESSION["staff"]["staff_id"];
  $staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
  $staff = $staff_name->fetch_assoc();

  if (isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
  } else {
    $bill_id =time();
  }

 
?>
    <html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">


      <link rel="stylesheet" href="./OSS Restaurant System_files/cus_css.css">

      <script src="./OSS Restaurant System_files/jquery-3.5.1.js"></script>
      <script src="./OSS Restaurant System_files/jquery.dataTables.min.js"></script>
      <script src="./OSS Restaurant System_files/dataTables.bootstrap4.min.js"></script>
      <!-- <link rel="stylesheet" href="./OSS Restaurant System_files/bootstrap.css">
  <link rel="stylesheet" href="./OSS Restaurant System_files/dataTables.bootstrap4.min.css"> -->

      <link rel="stylesheet" href="./OSS Restaurant System_files/sweetalert2.min.css">
      <script src="./OSS Restaurant System_files/sweetalert2.min.js"></script>

      <!-- <link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.css">
  <link rel="stylesheet" href="./OSS Restaurant System_files/font-awesome.min.css"> -->
      <?php require_once('partials/_head.php'); ?>

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

                 
                      ?>
                      <tr>
                        <td>System ID<br><input name="bill_id" type="text" class="form-control form-control-sm" id="bill_id" value="<?php echo $bill_id; ?>" readonly=""></td>
                        <td class="pl-2">user<br><input type="text" class="form-control form-control-sm" readonly="" id="user" value="<?php echo $staff["staff_name"] ?>"></td>
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
                    <div class="btn btn-dark w-100 p-3 text-warning" onClick="filte_cat('all');"><i class="ni ni-tv-2 "></i> All Item's</div>
                    <?php
                    for ($i = 0; $i < $row; $i++) {
                      $data = $catergory_rs->fetch_assoc();


                    ?>

                      <div class="btn btn-light w-100 mt-1 p-3 text-dark" style=" text-transform: uppercase;" onclick="filte_cat('<?php echo $data['id']; ?>');"><?php echo $data['name']; ?></div>
                    <?php
                    }
                    ?>


                  </div>


                </td>
              </tr>
              <tr>
                <td valign="top" style="width: 30%; background-color: #EEEEEE;">

                  <table style="width: 100%; margin-bottom: 5px; margin-top: 10px;">
                    <tbody>

                      <tr>
                        <th colspan="2">
                          <table style="width: 100%; margin-top: 5px;">
                            <tbody>
                              <tr class="">



                                <td><label class="btn btn-sm btn-light w-100 border-dark text-left text-dark"><input type="radio" value="1" name="type"  > UBER </label></td>
                                <td><label class="btn btn-sm btn-light w-100 border-dark text-left text-dark"><input type="radio" value="2" name="type"  > PIKE ME </label></td>
                                <td><label class="btn btn-sm btn-light w-100 border-dark text-left text-dark"><input type="radio" value="3" name="type" checked  > OTHER </label></td>

                              </tr>
                            </tbody>
                          </table>

                        </th>
                      </tr>
                      <script>
                        window.addEventListener("load", function() {
                          document.getElementById("product_barcode").focus();

                        });
                      </script>

                      <tr>
                        <th scope="col" style="width: 80%;"><input name="product_barcode" type="text" class="form-control form-control-sm" id="product_barcode" placeholder="Product Code" list="product_list" autocomplete="off" onkeyup="select_qty(event);"></th>
                        <th scope="col" style="width: 20%;"><input name="sale_qty" type="tel" class="form-control form-control-sm" id="sale_qty" placeholder="QTY" autocomplete="" onkeyup="JavaScript:save_list(event,this.value);"></th>
                      </tr>

                    </tbody>
                  </table>

                  <div class="table-responsive">
                    <table class="table table-bordered" style=" font-size: 14px;">
                      <tbody id='table_view'>
                        <?php
                        $d = Database::search("SELECT * FROM rpos_orders WHERE order_code = '" . $bill_id . "'");
                        $d_num = $d->num_rows;
                        $total = 0;
                        if ($d_num != 0) {
                          for ($p = 0; $p < $d_num; $p++) {
                            $d_fetch = $d->fetch_assoc();
                            $product_id = $d_fetch["prod_id"];
                            $product = Database::search("SELECT * FROM rpos_products WHERE prod_id = '" . $product_id . "'");
                            $pro_f = $product->fetch_assoc();
                            $p_id = $d_fetch["prod_price"];
                            $total = $p_id + $total;
                        ?>
                            <div style="width: 50px;">

                              <tr>
                                <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $pro_f["prod_name"] ?></td>
                              </tr>

                              <form>
                                <input name="" type="hidden" id="bill_id" value="">
                                <input name="" type="hidden" id="sale_id" value="">
                                <tr style="border-bottom: 2px dashed #000000;">
                                  <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo $pro_f["prod_price"] ?>" disabled></td>
                                  <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $d_fetch["prod_qty"] ?>" disabled></td>
                                  <td align="right" style="width: 100px;" id="total"><?php echo $d_fetch["prod_price"] ?></td>
                                  <td align="center" style="width: 20px;">
                                    <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                                  </td>
                                </tr>
                                <button type="submit" style="display: none;"></button>
                              </form>

                            </div>
                        <?php
                          }
                        }
                        ?>

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
                  <?php if ($d_num != 0) { ?>
                    <h1 class="text-warning" style=" font-weight:bold;"><?php echo  $total ?>.00</h1>
                    <h5 style="color: white;"><?php echo $d_num ?> Item(s)</h5>
                  <?php } else {
                  ?>
                    <h1 class="text-warning" style=" font-weight:bold;">0.00</h1>
                    <h5 style="color: white;">0 Item</h5>
                  <?php
                  } ?>
                </td>

                <td colspan="2" valign="top">
                  <table style="width: 100%; height: 100%;">
                    <tbody>
                      <tr align="center">
                        <td align="center" valign="middle" class="bg-success" style=" color: white; width: 15%; cursor: pointer;" onkeyup="" onclick=" bill(); ">
                          <h4 style="margin: 0; padding: 0;">Takeaway</h4>
                          <h6 style="margin: 0; padding: 0;">(F8)</h6>
                        </td>
                        <td align="center" valign="middle" class="bg-warning" style=" color: white; width:15%; cursor: pointer;" onclick="dinfun();">
                          <h4 style="margin: 0; padding: 0;">Table</h4>
                          <h6 style="margin: 0; padding: 0;">(F9)</h6>
                        </td>

                        <td align="center" valign="middle" class="bg-secondary" style="  width: 15%; cursor: pointer;width:auto;" onclick="b();">
                          <h4 style="margin: 0; padding: 0;">Day Summery</h4>
                        </td>
                        <td align="center" valign="middle" class="bg-danger" style="  width: 15%; cursor: pointer;width:auto;" onclick="bill_claer();" onkeyup="JavaScript:bill_claer(event);">
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
        function select_qty(event) {
          if (event.keyCode == 13) {
            document.getElementById('sale_qty').value = "1";
            document.getElementById('sale_qty').select();

          }
        }

        function bill() {

          var bill_id = document.getElementById('bill_id').value;

          var selectedGender = document.querySelector('input[name="type"]:checked');
          var type = selectedGender.value;
         
          window.location = "bill_payment.php?bill_id=" + bill_id + "&type=" + type;

        }

        function dinfun() {
          var bill_id = document.getElementById('bill_id').value;
          window.location = "table.php";
        }

        window.addEventListener("keyup", function(event) {
          //console.log(event.keyCode);

          if (event.keyCode == 119) {

            bill();

          }

          if (event.keyCode == 120) {

            dinfun();



          }
        });


        function list_value_send(product_barcode) {
          document.getElementById('product_barcode').value = product_barcode;
          document.getElementById('sale_qty').value = "1";
          document.getElementById('sale_qty').select();
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
  include "404.php";
}
?>