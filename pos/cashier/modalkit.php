<?php
session_start();
require_once('partials/_head.php');
require "connection.php";

$netamount = $_POST["net_amount"];
$balance = $_POST["balance"];

$discount = $_POST["sale_details_discount"];
$payment = $_POST["payment"];

if (isset($_SESSION["staff"])) {
} else {
    echo ("fuv");
}


$total = $_POST["total"];
$bill_id = $_POST["bill_id"];

$product = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code` = '" . $bill_id . "' ");
$product_row = $product->num_rows;
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d');
$time = date("h:i:s A ");
?>



<!-- Bootstrap Modal -->
<style media="print">
    * {
        margin: 0px;
        padding: 0px;
        font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
        font-size: 12px;
    }

    .take-class {
        font-weight: bold;
        text-align: center;
        font-size: 14px;
    }

    .line-brack {
        border-bottom: 1px solid #000000;
        width: 100%;
        margin: 3px 0px;
    }

    .bill-img {
        text-align: center;
    }

    .bill-title {
        font-size: 18px;
        text-align: center;
        font-weight: bold;
    }

    .bill-mobile {
        font-size: 14px;
        text-align: center;
    }

    .bill-footer {
        font-size: 12px;
        text-align: center;
    }
</style>
</head>

<body style="margin: 0px; padding: 0px;">

    <div style="page-break-after: always;">


        <div class="text-center" style="align-content: center;">
        <h1   >COPY</h1> 
        </div>
     <?php   
        $type = $_POST["type"];
    if ($type == 1) {
        $dil = "Uber";
    } else if ($type == 2) {
        $dil = "Pick Me";
    } else if ($type == 3) {
        $dil = "other";
    } else if ($type == 4) {
        $dil = "dining";
    }

   ?>     <table style="width: 100%;">
            <tbody>
               
                <tr>
                    <td>Bill</td>
                    <td style="font-weight: bold;"><?php echo $bill_id ?></td>
                    <td>User</td>
                    <td><?php echo $_SESSION["staff"]["staff_name"]; ?></td>
                    <td>Type</td>
                    <td><?php echo $dil ?></td>
            
                </tr>
            </tbody>
        </table>

        <table style="width: 100%;">
            <tbody>

               
                <?php
                for ($i = 0; $i < $product_row; $i++) {
                    $product_rs = $product->fetch_assoc();

                    $a = Database::search("SELECT* FROM `rpos_products` WHERE `prod_id`='" . $product_rs["prod_id"] . "'  ");
                    $b = $a->fetch_assoc();

                    $d = $b["prod_price"] * $product_rs["prod_qty"];


                    $discount_total = $netamount * ($discount / 100);

                ?>
                    <div id="kichen">
                        <tr>
                            <td colspan="3"><?php echo $b["prod_name"]; ?></td>
                        </tr>

                        <tr valign="bottom">
                            <td><?php echo $b["prod_price"]; ?>
                            </td>
                            <td align="center"><?php echo $product_rs["prod_qty"]; ?></td>
                            <td align="right"><?php echo $d ?>.00
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div style="border-bottom: 1px dashed #000000;"></div>
                            </td>
                        </tr>
                    </div>
                <?php }
                ?>


                
            </tbody>
        </table>
        
           