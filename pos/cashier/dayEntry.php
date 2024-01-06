<?php
require "connection.php";
require_once('partials/_head.php');

session_start();
$status = $_SESSION["staff"]["staff_id"];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
	<title>OSS Restaurant System</title>
	<link rel="stylesheet" href="main_css.css">

	<script src="data_table/js/jquery-3.5.1.js"></script>
	<script src="data_table/js/jquery.dataTables.min.js"></script>
	<script src="data_table/js/dataTables.bootstrap4.min.js"></script>
	<!-- <link rel="stylesheet" href="data_table/css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="data_table/css/dataTables.bootstrap4.min.css"> -->

	<!-- <link rel="stylesheet" href="icon/css/font-awesome.css">
	<link rel="stylesheet" href="icon/css/font-awesome.min.css">

	<link rel="stylesheet" href="alert/sweetalert2.min.css"> -->
	<script src="alert/sweetalert2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
	<!-- <script>
		window.addEventListener("load", function() {
			var load_screen = document.getElementById('load_screen');
			document.body.removeChild(load_screen);
		});
	</script>

	<div id="load_screen">
		<div id="loading"><img src="image/loading.gif" width="80px;">Please Wait...</div>
	</div> -->

	<style>
		.menu-btn {
			background-color: #343a40;
			color: white;
			outline: none;
			border-radius: 2px;
			padding: 5px;
			font-size: 14px;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
			text-decoration: none;
		}

		.menu-btn:hover {
			text-decoration: none;
			color: white;
		}
	</style>

	<div style="text-align: right; margin-bottom: 10px;">
		<a href="dashboard.php" class="menu-btn" onkeyup="select_qty(event);">Back to POS</a>
		<a href="dayEntry.php" class="menu-btn">My Sale List</a>
		<a href="dayend.php" class="menu-btn">Day End Report</a>
	</div>
	<div class="contaner">



		<table class="mb-2">
			<tbody>
				<tr>
					<td>From Date<input name="from_date" type="date" class="form-control form-control-sm" id="from_date"></td>
					<td>To Date<input name="to_date" type="date" class="form-control form-control-sm" id="to_date"></td>
					<td><br><button type="submit" class="btn btn-dark btn-sm ml-2" onclick="filter();"><i class="fa fa-filter"></i> Filter</button></td>
				</tr>
			</tbody>
		</table>

		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="dataTables_length" id="example_length">
					<select id="select" onchange="selectdata(this.options[this.selectedIndex].value)">
						<option selected="" hidden value="All">SELECT</option>
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select> entries</label>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div id="example_filter" class="dataTables_filter">
					<label>Search:<input type="search" class="form-control form-control-sm" id="search" placeholder="" aria-controls="example"></label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="table-responsive">
				<table id="example" class="table list-table" style="width:100%; font-size: 14px; text-transform: capitalize;">
					<thead>
						<?php $ful_total = 0; ?>
						<tr>
							<th>No.</th>
							<th>Bill ID</th>
							<th>Bill Amount</th>
							<th>Cash</th>
							<th>Card</th>
							<th>User</th>
							<th>Sale Time</th>
						</tr>
					</thead>
					<tbody id='filter_table'>
						<?php
						date_default_timezone_set('Asia/Colombo');
						$date = date('Y-m-d');
$shift = Database::search("SELECT * FROM `rpos_shift` WHERE `rpos_staff_staff_id`='" . $status . "' AND `rpos_status_id`='1'");
$shift_data = $shift->fetch_assoc();

  $shift_has_pay = Database::search("SELECT * FROM `rpos_payments_has_rpos_shift` WHERE `rpos_shift_shift_id`='" . $shift_data["shift_id"] . "' ");
  for ($i = 0; $i < $shift_has_pay->num_rows; $i++) {
	$shift_has_pay_data = $shift_has_pay->fetch_assoc();
						$receipt = Database::search("SELECT * FROM `rpos_payments` WHERE `pay_id` ='".$shift_has_pay_data["rpos_payments_pay_id"]."' AND `created_at` = '" . $date . "' LIMIT 5");
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
								<td style="text-align: left;"><?php echo number_format($total_amt,2) ?></td>
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
								$da = Database::search("SELECT * FROM `rpos_payments_has_rpos_shift` WHERE `rpos_payments_pay_id` = '" . $receipt_data["pay_id"] . "'");
								$da_f = $da->fetch_assoc();
								$id = Database::search("SELECT * FROM `rpos_shift` WHERE `shift_id` = '" . $da_f["rpos_shift_shift_id"] . "'");
								$id_F = $id->fetch_assoc();
								$staf = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $id_F["rpos_staff_staff_id"] . "'");
								$staf_fec = $staf->fetch_assoc();
								?>

								<td class="text-capitalize"><?php echo $staf_fec["staff_name"]; ?></td>
								<?php
								$real_date = date('d/M/Y', strtotime($receipt_data["created_at"]));
								$real_time = date('H:i', strtotime($receipt_data["created_time"]));
								?>
								<td><?php echo $real_date ." ".$real_time?></td>
							</tr>
						<?php
						}}
						?>

						<tr style="font-weight: bold; background-color: #DDDDDD;">
							<td colspan="2" align="right">Total Amount</td>
							<?php
							$f = Database::search("SELECT sum(pay_amt) AS total FROM rpos_payments WHERE created_at = '" . $date . "'");
							$f_fetch = $f->fetch_assoc();

							if ($f_fetch == null && $f_fetch["total"] == 0) {
							?>
								<td align="left">0.00</td>
							<?php

							} else {
							?>

								<td align="left"><?php echo number_format($f_fetch["total"],2) ?></td>

							<?php

							}
							?>
							<td colspan="6"></td>
						</tr>

					</tbody>

				</table>
			</div>
			<script type="text/javascript">
				function selectdata(cat) {
					$.ajax({
						url: 'filter.php',
						method: 'post',
						data: 'cat_name=' + cat,
						success: function(filter_table) {
							$("#filter_table").html(filter_table);
						}
					});
				}
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#search").keyup(function() {
						var input = $(this).val();
						if (input != "") {
							$.ajax({
								url: "liveSearch.php",
								method: "POST",
								data: {
									input: input,
								},
								success: function(data) {
									$("#filter_table").html(data);
								}
							});
						} else {

							window.location.reload();
						}
					});
				});
			</script>
			<script>
				document.addEventListener("keydown", function(event) {
					if (event.key === "Escape") {
						window.location = "dashboard.php";
					}
				});
			</script>
			<script src="script.js"></script>
		</div>
	</div>



</body>

</html>