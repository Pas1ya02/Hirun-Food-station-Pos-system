<?php
require "connection.php";
$table = $_POST["table"];
$have_table1 = Database::search("SELECT * FROM `rpos_table` WHERE `table_id`='" . $table . "' ");
$tn1 = $have_table1->num_rows;

if($tn1 == 0){
    echo "ok";
}else{
    $have_table = Database::search("SELECT * FROM `rpos_dining` WHERE `rpos_table_table_id`='" . $table . "' AND `rpos_status_id` = '1'");
    $tn = $have_table->num_rows;
    $tf = $have_table->fetch_assoc();
    
    if ($tn == 1) {
        $order = $tf["order_code"];
        $r = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code` = '" . $order . "'");
        $rn = $r->num_rows;
        for ($i = 0; $i < $rn; $i++) {
            $rf = $r->fetch_assoc();
            $product = Database::search("SELECT * FROM `rpos_products` WHERE `prod_id` = '" . $rf["prod_id"] . "'");
            $product_fetch = $product->fetch_assoc();
    ?>
            <tr>
                <td colspan="4" style="font-weight: bold; text-transform: capitalize; background-color: #EEEEEE;"><?php echo $product_fetch["prod_name"] ?></td>
            </tr>
            <form>
                <input name="bill_id" type="hidden" id="bill_id" value="1697026905">
                <input name="sale_id" type="hidden" id="sale_id" value="38">
                <tr style="border-bottom: 2px dashed #000000;">
                    <td style="width: 100px;"><input name="sale_saleprice" type="text" class="list-text" id="sale_saleprice" onFocus="this.select();" value="<?php echo number_format($product_fetch["prod_price"],2) ?>" disabled></td>
                    <td style="width: 100px;"><input name="sale_qty" type="text" class="list-text" id="" style="text-align: center;" pattern="[0-9]+([\.][0-9]{0,2})?" onFocus="this.select();" value="<?php echo $rf["prod_qty"] ?>" disabled></td>
                    <td align="right" style="width: 100px;" id="total"><?php echo number_format($rf["prod_price"],2) ?></td>
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