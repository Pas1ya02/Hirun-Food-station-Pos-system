<?php
require "connection.php";
date_default_timezone_set('Asia/Colombo');
$from = $_POST["from_date"];
$to = $_POST["to_date"];
$select = $_POST["select"];
if(empty($from) AND !empty($to)){
        $to = $_POST["to_date"];
}else if(empty($to) AND !empty($from)){
    $from = $_POST["from_date"];
    $to = date('Y-m-d');
}else if(empty($to) AND empty($from)){
	$from = date('Y-m-d');
	$to = date('Y-m-d');
}
$query = "SELECT * FROM `rpos_payments` WHERE created_at >= '" . $from . "'AND created_at <= '" . $to . "'";
if ($select != "All") {
	$s = $select;
	$query .= " LIMIT $s";
}
$ful_total = 0;

$receipt = Database::search($query);
$receipt_number = $receipt->num_rows;
for ($x = 1; $x <= $receipt_number; $x++) {
	$receipt_data = $receipt->fetch_assoc();
	$bil_id = $receipt_data["order_code"];
	$payment = $receipt_data["payment_method_id"];
	$total_amt = $receipt_data["pay_amt"];
	$ful_total = $ful_total + $total_amt;
	$amount = Database::search("SELECT * FROM `day_summery_method` WHERE `order_code` = '" . $bil_id . "'");

	$amount_fetch = $amount->fetch_assoc();
?>
	<tr>
		<td><?php echo $x ?></td>
		<td><?php echo $bil_id ?></td>
		<td style="text-align: left;"><?php echo $total_amt; ?></td>
		<?php if (3 == $payment) { ?>
			<td style="text-align: left;"><?php echo  number_format($amount_fetch["cash"],2) ?></td>
			<td style="text-align: left;"><?php echo  number_format($amount_fetch["card"],2) ?></td>
		<?php } elseif (2 == $payment) { ?>
			<td style="text-align: left;">0.00</td>
			<td style="text-align: left;"><?php echo number_format($total_amt,2) ?></td>
		<?php } else { ?>
			<td style="text-align: left;"><?php echo number_format($total_amt,2) ?></td>
			<td style="text-align: left;">0.00</td>
		<?php } ?>
		
			<?php 
								$da= Database::search("SELECT * FROM `rpos_payments_has_rpos_shift` WHERE `rpos_payments_pay_id` = '" . $receipt_data["pay_id"] . "'");
								$da_f = $da->fetch_assoc();
								$id= Database::search("SELECT * FROM `rpos_shift` WHERE `shift_id` = '" . $da_f["rpos_shift_shift_id"]. "'");
								$id_F = $id->fetch_assoc();
								$staf= Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $id_F["rpos_staff_staff_id"]. "'");
								$staf_fec = $staf->fetch_assoc();
								?>
									
								<td class="text-capitalize"><?php echo $staf_fec["staff_name"]; ?></td>
		<?php
		$real_date = date('d/M/Y', strtotime($receipt_data["created_at"]));
		$real_time = date('H:i', strtotime($receipt_data["created_time"]));
		?>
		<td><?php echo $real_date." ". $real_time ?></td>
	</tr>
<?php
}
?>
<tr style="font-weight: bold; background-color: #DDDDDD;">
	<td colspan="2" align="right">Total Amount</td>
	<?php if(empty($ful_total)){
		?>
		<td align="left">0.00</td>
		<?php
	}else{ ?>
	<td align="left"><?php echo $ful_total ?></td>
	<?php 
	}
	?>
	<td colspan="6"></td>
</tr>