<?php
session_start();
include('config/config.php');
require "connection.php";
include('config/checklogin.php');
if (isset($_SESSION["staff"])) {
	$status = $_SESSION["staff"]["staff_id"];
	$staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
	$staff = $staff_name->fetch_assoc();
	$staffname = $staff["staff_name"];

	require_once('partials/_head.php');
?>


	<style>
		.pending-table {
			border-collapse: collapse;
			margin: 20px auto;
		}

		.pending-table td {
			padding: 5px;
			border: 2px solid #000000;
		}

		.tale-cell {
			width: 100px;
			background-color: orangered;
			color: white;
			font-weight: bold;
			font-size: 34px;
		}

		.com-btn {
			text-align: center;
			width: 100px;
			background-color: green;
			color: white;
		}

		.up-btn {
			text-align: center;
			width: 100px;
			background-color: gray;
			color: white;
		}

		.remove-btn {
			text-align: center;
			width: 100px;
			background-color: red;
			color: white;
		}

		.select-btn:hover {
			opacity: 0.8;
			cursor: pointer;
		}
	</style>
	</head>

	<body>

		<h2 align="center" style="margin-top: 20px;">Pending Table Order</h2>

		<div align="center"><a href="table.php" class="btn btn-sm btn-dark">Back to POS</a></div>

		<?php
		$dining = Database::search("SELECT * FROM `rpos_dining` WHERE `rpos_status_id`='1'");
		$dining_rs = $dining->num_rows;

		for ($i = 0; $i < $dining_rs; $i++) {
			$dining_data = $dining->fetch_assoc();

			$order = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code`='" . $dining_data["order_code"] . "' ");
			$order_data  = $order->fetch_assoc();

			$order1 = Database::search("SELECT sum(`prod_price`) AS total FROM `rpos_orders` WHERE `order_code`='" . $dining_data["order_code"] . "' ");
			$order_data1  = $order1->fetch_assoc();
		?>

			<table class="pending-table">
				<tbody>
					<tr>
						<td align="center" valign="middle" class="tale-cell ">
							<div>#<?php echo $dining_data["rpos_table_table_id"];  ?></div>
						</td>
						<td style="padding: 5px 30px;"><strong><?php echo $dining_data["order_code"];  ?></strong><br><?php echo $order_data["created_at"];  ?> <?php echo $order_data["created_time"];  ?><br><?php echo number_format($order_data1["total"], 2);  ?>


						</td>
						<td><?php if ($order_data["order_status"] == 2) {
								echo "<span class='badge badge-danger'> Paid</span>";
							} else {
								echo "<span class='badge badge-success'>Paid</span>";
							} ?></td>
						</td>

						<td class="up-btn select-btn btn-info" style="background-color: red;" onclick="removetable(<?php echo $dining_data['order_code'] ?>)">Remove</td>
					</tr>
				</tbody>
			</table>

		<?php
		}
		?>

		<script>
			function removetable(x) {
				if (confirm('Are you sure you want to remove')) {

					var form = new FormData();

					form.append('ordercode', x);
					

					var r = new XMLHttpRequest();

					r.onreadystatechange = function() {
						if (r.readyState == 4) {
							var t = r.responseText;
							
							if(t == "deleted"){
								swal("Success", "", "success");
								
								
							}else{
								alert("Error Please try again");
							}
							window.location="table.php";
						}
					}

					r.open("POST", "removetableprocess.php", true);
					r.send(form);

				}

			}

			window.addEventListener("keyup", function(event) {
				if (event.keyCode == 27) {
					window.location = "table.php";
				}
			});
		</script>

	</body>

	</html>
	<script src="bootstrap.bundle.js"></script>
<?php

} else {
	include "404.php";
}

?>