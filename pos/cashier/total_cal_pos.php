<?php

require "connection.php";

$bill_id= $_POST["bill_id"];


$rs=Database::search("SELECT * FROM `rpos_orders` WHERE `order_code`='".$bill_id."' ");
$rs_row=$rs->num_rows;

$total=0;


for($i=0;$i<$rs_row;$i++){
    $rs_data = $rs->fetch_assoc();
    $total=$total+$rs_data['prod_price'];

}
?>
<h1 class=""  style="max: width 100px; color:tomato; font-weight:bold;"><?php echo number_format($total ,2) ?></h1>
<h5 class="" style="max: width 100px; color: white;"><?php echo $rs_row?> Item(s)</h5>

