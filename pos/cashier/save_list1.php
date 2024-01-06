<?php
require "connection.php";

$product_id = $_POST["product_barcode"];
$sale_qty = $_POST["sale_qty"];
$bill_id = $_POST["bill_id"];
$table = $_POST["table"];

if (empty($table)) {
    echo "ok";
} else if (empty($product_id)) {
    echo "ck";
} else {
    $pr = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id`='" . $product_id . "' ");
    $prr = $pr->num_rows;
    $prd = $pr->fetch_assoc();

    if ($prr == 0) {
        $pro = Database::search("SELECT * FROM `rpos_orders`INNER JOIN `rpos_products` ON `rpos_orders`.`prod_id` = `rpos_products`.`prod_id` WHERE `order_code`='" . $bill_id . "'");
        $pro_n = $pro->num_rows;

        for ($p = 0; $p < $pro_n; $p++) {
            $pro_f = $pro->fetch_assoc();
?>
            <tr>
                <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $pro_f["prod_name"] ?></td>
            </tr>
            <form>
                <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                <input name="sale_id" type="hidden" id="sale_id" value="38">
                <tr style="border-bottom: 2px dashed #000000;">
                    <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($pro_f["prod_price"], 2) ?>" disabled></td>
                    <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $pro_f["prod_qty"] ?>" disabled></td>
                    <td align="right" style="width: 100px;" id="total"><?php echo number_format($pro_f["prod_price"], 2) ?></td>
                    <td align="center" style="width: 20px;">
                        <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                    </td>
                </tr>
                <button type="submit" style="display: none;"></button>
            </form>
            <?php
        }
    } else {
        $total = 0;
        $total = $prd["prod_price"] * $sale_qty;

        if ($prr = 0) {
            echo 'product not found';
        } else {
            $dining = Database::search("SELECT * FROM `rpos_dining` WHERE `rpos_table_table_id` = '" . $table . "' AND `order_code` = '" . $bill_id . "'");
            $dining_num = $dining->num_rows;
            if ($dining_num == 0) {
                $oders = Database::search("SELECT * FROM `rpos_orders` WHERE `prod_id`='" . $product_id . "' AND `order_code`='" . $bill_id . "' ");
                $r = $oders->num_rows;
                $f = $oders->fetch_assoc();
                $o_id = time();
                $d_id = time();
                date_default_timezone_set('Asia/Colombo');
                $date = date('Y-m-d ');
                $time = date('h:i:s');
                if ($r == 0) {
                    $oder = Database::iud("INSERT INTO `rpos_orders` (`order_id`,`prod_qty`,`prod_price`,`prod_id`,`order_code`,`created_at`,`order_status`,`created_time`) VALUES ('" . $o_id . "','" . $sale_qty . "','" . $total . "','" . $product_id . "','" . $bill_id . "','" . $date . "','2','" . $time . "')");
                    $oder = Database::iud("INSERT INTO `rpos_dining` (`dining_code`,`order_code`,`rpos_table_table_id`,`rpos_status_id`) VALUES ('" . $d_id . "','" . $bill_id . "','" . $table . "','1')");
                    $oderA = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code` = '" . $bill_id . "'");
                    $Ar = $oderA->num_rows;

                    for ($i = 0; $i < $Ar; $i++) {
                        $Af = $oderA->fetch_assoc();
                        $oderB = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id` = '" . $Af["prod_id"] . "'");
                        $productA = $oderB->fetch_assoc();

            ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $productA["prod_name"] ?></td>
                        </tr>
                        <form>
                            <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                            <input name="sale_id" type="hidden" id="sale_id" value="38">
                            <tr style="border-bottom: 2px dashed #000000;">
                                <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($productA["prod_price"], 2) ?>" disabled></td>
                                <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $Af["prod_qty"] ?>" disabled></td>
                                <td align="right" style="width: 100px;" id="total"><?php echo number_format($Af["prod_price"], 2) ?></td>
                                <td align="center" style="width: 20px;">
                                    <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                                </td>
                            </tr>
                            <button type="submit" style="display: none;"></button>
                        </form>

                    <?php
                    }
                } else {
                    $gh = $f["prod_qty"];
                    $to = $gh + $sale_qty;
                    $op = $prd["prod_price"] * $to;

                    $oderUp = Database::iud("UPDATE `rpos_orders` SET `prod_qty` = '" . $to . "',`prod_price` = '" . $op . "',`created_at`='" . $date . "' WHERE `prod_id` = '" . $product_id . "'  AND `order_code`='" . $bill_id . "'  ");
                    $oderF = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code`='" . $bill_id . "'");
                    $AR = $oderF->num_rows;
                    for ($i = 0; $i < $AR; $i++) {
                        $AF = $oderF->fetch_assoc();
                        $oderV = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id` = '" . $AF["prod_id"] . "' ");
                        $productT = $oderV->fetch_assoc();

                    ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $productT["prod_name"] ?></td>
                        </tr>
                        <form>
                            <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                            <input name="sale_id" type="hidden" id="sale_id" value="38">
                            <tr style="border-bottom: 2px dashed #000000;">
                                <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($productT["prod_price"], 2) ?>" disabled></td>
                                <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $AF["prod_qty"] ?>" disabled></td>
                                <td align="right" style="width: 100px;" id="total"><?php echo number_format($AF["prod_price"], 2) ?></td>
                                <td align="center" style="width: 20px;">
                                    <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                                </td>
                            </tr>
                            <button type="submit" style="display: none;"></button>

                        </form>
                    <?php
                    }
                }
            } else {
                $oders = Database::search("SELECT * FROM `rpos_orders` WHERE `prod_id`='" . $product_id . "' AND `order_code`='" . $bill_id . "' ");
                $r = $oders->num_rows;
                $f = $oders->fetch_assoc();
                $o_id = time();
                $d_id = time();
                date_default_timezone_set('Asia/Colombo');
                $date = date('Y-m-d ');
                $time = date('h:i:s');
                if ($r == 0) {
                    $oder = Database::iud("INSERT INTO `rpos_orders` (`order_id`,`prod_qty`,`prod_price`,`prod_id`,`order_code`,`created_at`,`order_status`,`created_time`) VALUES ('" . $o_id . "','" . $sale_qty . "','" . $total . "','" . $product_id . "','" . $bill_id . "','" . $date . "','1','" . $time . "')");
                    $oderA = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code` = '" . $bill_id . "'");
                    $Ar = $oderA->num_rows;

                    for ($i = 0; $i < $Ar; $i++) {
                        $Af = $oderA->fetch_assoc();
                        $oderB = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id` = '" . $Af["prod_id"] . "'");
                        $productA = $oderB->fetch_assoc();

                    ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $productA["prod_name"] ?></td>
                        </tr>
                        <form>
                            <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                            <input name="sale_id" type="hidden" id="sale_id" value="38">
                            <tr style="border-bottom: 2px dashed #000000;">
                                <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($productA["prod_price"], 2) ?>" disabled></td>
                                <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $Af["prod_qty"] ?>" disabled></td>
                                <td align="right" style="width: 100px;" id="total"><?php echo number_format($Af["prod_price"], 2)  ?></td>
                                <td align="center" style="width: 20px;">
                                    <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                                </td>
                            </tr>
                            <button type="submit" style="display: none;"></button>
                        </form>

                    <?php
                    }
                } else {
                    $gh = $f["prod_qty"];
                    $to = $gh + $sale_qty;
                    $op = $prd["prod_price"] * $to;

                    $oderUp = Database::iud("UPDATE `rpos_orders` SET `prod_qty` = '" . $to . "',`prod_price` = '" . $op . "',`created_at`='" . $date . "' WHERE `prod_id` = '" . $product_id . "'  AND `order_code`='" . $bill_id . "'  ");
                    $oderF = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code`='" . $bill_id . "'");
                    $AR = $oderF->num_rows;
                    for ($i = 0; $i < $AR; $i++) {
                        $AF = $oderF->fetch_assoc();
                        $oderV = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id` = '" . $AF["prod_id"] . "' ");
                        $productT = $oderV->fetch_assoc();

                    ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $productT["prod_name"] ?></td>
                        </tr>
                        <form>
                            <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                            <input name="sale_id" type="hidden" id="sale_id" value="38">
                            <tr style="border-bottom: 2px dashed #000000;">
                                <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($productT["prod_price"], 2) ?>" disabled></td>
                                <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $AF["prod_qty"] ?>" disabled></td>
                                <td align="right" style="width: 100px;" id="total"><?php echo number_format($AF["prod_price"], 2) ?></td>
                                <td align="center" style="width: 20px;">
                                    <a href="add_special_note.php?bill_id=1697026905&sale_id=38" class="badge badge-info" title="Add Special Note"><i class="fa fa-info fa-lg"></i></a>
                                </td>
                            </tr>
                            <button type="submit" style="display: none;"></button>

                        </form>
    <?php
                    }
                }
            }
        }
    }
    ?>

    <body>
        <?php
        require_once('partials/_scripts.php');
        ?>
        <script src="script.js"></script>

    </body>

    </html>
<?php } ?>