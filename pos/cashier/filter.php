<?php
session_start();
$status = $_SESSION["staff"]["staff_id"];
require "connection.php";
$catname = $_POST['cat_name'];

if ($catname != 'All') {
	$cond = $catname;
} else {
	$cond = 0;
}
$ful_total = 0;
date_default_timezone_set('Asia/Colombo');
							$date = date('Y-m-d');
$receipt = Database::search("SELECT * FROM `rpos_payments` WHERE `created_at` = '".$date."' LIMIT $cond");
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
		$real_time = date('H:i:s', strtotime($receipt_data["created_time"]));
		?>
		<td><?php echo $real_date." ". $real_time ?></td>
	</tr>
<?php
}
?>

<tr style="font-weight: bold; background-color: #DDDDDD;">
	<td colspan="2" align="right">Total Amount</td>
	<?php 
                            $f = Database::search("SELECT sum(pay_amt) AS total FROM rpos_payments WHERE created_at = '".$date."'");
                            $f_fetch = $f->fetch_assoc();
                            ?>
                            <td align="left"><?php echo $f_fetch["total"]; ?></td>
	<td colspan="6"></td>
</tr>