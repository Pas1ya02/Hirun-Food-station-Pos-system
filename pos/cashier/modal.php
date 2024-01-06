<?php
session_start();
require_once('partials/_head.php');
require "connection.php";

$netamount = $_POST["net_amount"];
$balance = $_POST["balance"];

$discount = $_POST["sale_details_discount"];
$payment = $_POST["payment"];


if (isset($_SESSION["staff"])) {



    $total = $_POST["total"];
    $bill_id = $_POST["bill_id"];
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
    $service_charge = $_POST["service_charge"];

    $with_service = ($total / 100) * $service_charge;

    $product = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code` = '" . $bill_id . "' ");
    $product_row = $product->num_rows;
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d');
    $time = date("H:i:s ");
?>



    <!-- Bootstrap Modal -->
    <style media="print">
        @media print {

            /* Use page-break-before to start a new page for the specified element */
            .start-new-page {
                page-break-before: always;
            }
        }

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
            <?php
            $bill = Database::search("SELECT * FROM `rpos_bill` ");
            $bill_data = $bill->fetch_assoc();
            ?>

            <div class="text-center">
                <?php
                if ($bill_data["rpos_status_id"] == 1) {
                ?>
                    <div class="bill-img"><img src="brand.png" style="width: 30%; "></div>

                <?php
                } else {
                }
                ?>

                <div class="bill-title"><?php echo $bill_data["bill_title"];   ?></div>
                <div class="bill-mobile" style="white-space: pre-line;"><?php echo $bill_data["bill_address"];   ?></div>
                <div class="bill-mobile" style="margin-bottom: 5px;"><?php echo $bill_data["bill_mobile"];   ?></div>
                <div style="border-bottom: 1px solid #000000;"></div>
            </div>


            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td>Date</td>
                        <td><?php echo $date ?></td>
                        <td>Time</td>
                        <td><?php echo $time ?></td>
                        <td>Type</td>
                        <td><?php echo $dil ?></td>
                    </tr>
                    <tr>
                        <td>Bill</td>
                        <td style="font-weight: bold;"><?php echo $bill_id ?></td>
                        <td>User</td>
                        <td><?php echo $_SESSION["staff"]["staff_name"]; ?></td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%;">
                <tbody>

                    <tr>
                        <td colspan="3">
                            <div style="border-bottom: 1px solid #000000;"></div>
                        </td>
                    </tr>
                    <tr style="font-weight: bold;" align="center">
                        <td>Price (LKR)</td>
                        <td>QTY</td>
                        <td>Amount (LKR)</td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div style="border-bottom: 1px solid #000000;"></div>
                        </td>
                    </tr>
                    <?php
                    for ($i = 0; $i < $product_row; $i++) {
                        $product_rs = $product->fetch_assoc();

                        $a = Database::search("SELECT* FROM `rpos_products` WHERE `prod_id`='" . $product_rs["prod_id"] . "'  ");
                        $b = $a->fetch_assoc();

                        $d = $b["prod_price"] * $product_rs["prod_qty"];


                        $discount_total = $_POST["total"] * ($discount / 100);
                        $x = $netamount * 100
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


                    <tr>
                        <td colspan="2" align="right">Service Charge</td>
                        <td align="right" style="border-bottom: 1px solid #000000;"><?php echo number_format($with_service, 2) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Amount</td>
                        <td align="right" style="border-bottom: 1px solid #000000;"><?php echo  number_format($total, 2) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Total Bill Discount</td>
                        <td align="right" style="border-bottom: 1px solid #000000;">(<?php echo number_format($discount_total, 2)  ?>)

                        </td>
                    </tr>
                    <tr style="font-weight: bold; font-size: 16px;">
                        <td colspan="2" align="right">Total Amount</td>
                        <td align="right" style="font-size: 20px; font-weight: bold; border-bottom: 1px solid #000000"><?php echo number_format($netamount, 2)   ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Payment</td>
                        <td align="right" style="border-bottom: 1px solid #000000;"><?php echo number_format($payment, 2)  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Balance</td>
                        <td align="right"><?php echo number_format($balance, 2) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="border-bottom: 1px solid #000000;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <?php echo $bill_data["bill_footer"];  ?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                        &copy;infinitiHex It Solution
                        </td>
                        
                    </tr>

                </tbody>
            </table>

        <?php
    } else {

        include "404.php";
    }

        ?>