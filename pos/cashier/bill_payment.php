<!doctype html>
<html>

<Head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>

    <script src="assets/js/swal.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</Head>

<?php

session_start();

require "connection.php";
require_once('partials/_head.php');
$bill_id = $_GET["bill_id"];

if (isset($_SESSION["staff"])) {
    $status = $_SESSION["staff"]["staff_id"];
    $staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
    $staff = $staff_name->fetch_assoc();
    $staffname = $staff["staff_name"];
    if (isset($bill_id)) {


        $rs = Database::search("SELECT * FROM `rpos_orders` WHERE `order_code`='" . $bill_id . "' ");
        $rs_row = $rs->num_rows;

        $total = 0;

        $dining = Database::search("SELECT * FROM `rpos_dining` WHERE `order_code` = '$bill_id'");
        $diningrow = $dining->num_rows;
        if ($diningrow == 1) {
            $type = '4';
        } else {
            $type = $_GET["type"];
        }


        for ($i = 0; $i < $rs_row; $i++) {
            $rs_data = $rs->fetch_assoc();
            $total = $total + $rs_data['prod_price'];
        }
?>

        <body class=" bg-dark">
            <table style="width: 100%; height: 100vh;">
                <tbody>
                    <tr>
                        <td align="center" valign="middle">
                            <?php
                            $bill = Database::search("SELECT * FROM `rpos_bill` ");
                            $bill_data = $bill->fetch_assoc();
                            ?>
                            <table class="table-sm bg-white">
                                <tbody>
                                    <tr>
                                        <td colspan="2" align="center" valign="middle" style="background-color: black; color: gold;">
                                            <span style="color: white;">Bill: <?php echo number_format($total, 2); ?></span><br>
                                            <span style="color: white;">Service: 0.00</span><br>
                                            <h1 class="text-warning" id="bill_amount" style="font-weight: bold;"><?php echo number_format($total, 2); ?></h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Discount (%)</td>
                                        <td><input type="number" class="form-control form-control-sm" id="sale_details_discount" onkeyup="cal_amount(<?php echo $total ?>);" value="<?php echo $bill_data["discount"] ?>" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Cash Payment</td>
                                        <td><input type="number" autofocus="autofocus" required="required" class="form-control form-control-sm" id="sale_details_cash_payment" onkeyup="cal_amount(<?php echo $total ?>);"></td>
                                    </tr>
                                    <tr>
                                        <td>Card Payment</td>
                                        <td><input type="number" class="form-control form-control-sm" id="sale_details_card_payment" onkeyup="cal_amount(<?php echo $total ?>);"></td>
                                    </tr>
                                    <?php
                                    if ($diningrow == 1) { ?>
                                        <tr>
                                            <td>Service Charge (%)</td>
                                            <td><input type="text" class="form-control form-control-sm" id="sale_details_service_charge" value="<?php echo $bill_data["service_charge"] ?>" readonly="readonly"></td>
                                        </tr>

                                    <?php
                                    } else { ?>
                                        <tr>
                                            <td>Service Charge (%)</td>
                                            <td><input type="text" class="form-control form-control-sm" id="sale_details_service_charge" value="0" readonly="readonly"></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>


                                    <div>
                                        <tr>
                                            <td>Net Amount</td>
                                            <td><input type="text" class="form-control form-control-sm " id="net_amount" style="background-color: rgba(255,255,0,0.2); font-weight: bold;" readonly="readonly" value="0.00"></td>
                                        </tr>
                                        <tr>
                                            <td>Balance</td>
                                            <td><input type="text" class="form-control form-control-sm" id="balance" style="background-color: rgba(0,128,0,0.2); font-weight: bold;" readonly="readonly"></td>
                                        </tr>
                                    </div>
                                    <tr style="display: none;">
                                        <td>Print KOT/BOT</td>
                                        <td><input name="kot_print" type="checkbox" id="kot_print" style="width: 30px; height: 30px;" checked></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <button type="button" id="openModalButton" data-bs-toggle="modal" data-bs-target="#exampleModal" " onclick="" class=" btn btn-sm btn-success">Payment</button>
                                            <a href="dashboard.php?bill_id=<?php echo  $bill_id ?>" class="btn btn-sm btn-dark">Back to Edit</a> <a href="" class="btn btn-sm btn-danger">Close Bill</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="sale_details_service_charge" type="hidden" id="sale_details_service_charge" value="0">


                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title " style="text-align: center;">Bill Payment</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p id="modalBody">

                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="printModalContent()">Print</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const modal = new bootstrap.Modal(document.getElementById("myModal"));
                const modalBody = document.getElementById("modalBody");


                // Function to open the Bootstrap modal and change its content

                function openModalWithContent() {

                    var sale_details_discount = document.getElementById("sale_details_discount").value;
                    var saleDetailsCashPayment = document.getElementById("sale_details_cash_payment").value;
                    var saleDetailsCardPayment = document.getElementById("sale_details_card_payment").value;
                    var net_amount = document.getElementById("net_amount").value;
                    var balance = document.getElementById("balance").value;
                    var service_charge = document.getElementById("sale_details_service_charge").value;

                    const payment = +saleDetailsCashPayment + +saleDetailsCardPayment;

                    var form = new FormData();
                    form.append("sale_details_discount", sale_details_discount);

                    form.append("net_amount", net_amount);
                    form.append("balance", balance);
                    form.append("payment", payment);
                    form.append("service_charge", service_charge);
                    form.append("bill_id", <?php echo $bill_id ?>);
                    form.append("type", <?php echo $type ?>);
                    form.append("total", <?php echo $total ?>);


                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            var t = r.responseText;

                            document.getElementById("modalBody").innerHTML = t;

                        }

                    }


                    r.open("POST", "modal.php", true);
                    r.send(form);

                    modal.show();

                }

                function openModalWithkitchen() {

                    var sale_details_discount = document.getElementById("sale_details_discount").value;
                    var saleDetailsCashPayment = document.getElementById("sale_details_cash_payment").value;
                    var saleDetailsCardPayment = document.getElementById("sale_details_card_payment").value;
                    var net_amount = document.getElementById("net_amount").value;
                    var balance = document.getElementById("balance").value;
                    const payment = +saleDetailsCashPayment + +saleDetailsCardPayment;

                    var form = new FormData();
                    form.append("sale_details_discount", sale_details_discount);

                    form.append("net_amount", net_amount);
                    form.append("balance", balance);
                    form.append("payment", payment);
                    form.append("type", <?php echo $type ?>);

                    form.append("bill_id", <?php echo $bill_id ?>);
                    form.append("total", <?php echo $total ?>);


                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            var t = r.responseText;

                            document.getElementById("modalBody").innerHTML = t;

                        }

                    }


                    r.open("POST", "modalkit.php", true);
                    r.send(form);

                    modal.show();

                }



                function payments() {
                    var amount = document.getElementById('net_amount').value;

                    const saleDetailsCashPayment = document.getElementById('sale_details_cash_payment').value;
                    const saleDetailsCardPayment = document.getElementById('sale_details_card_payment').value;

                    var form = new FormData();
                    form.append("cash", saleDetailsCashPayment);
                    form.append("Card", saleDetailsCardPayment);
                    form.append("amount", amount);
                    form.append("order_code", <?php echo $bill_id ?>);


                    var r = new XMLHttpRequest();

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {
                            var t = r.responseText;



                        }
                    }
                    r.open("POST", "payhere.php", true);
                    r.send(form);

                }
                document.addEventListener("keydown", function(event) {
                    if (event.key === "Enter") {

                        payments();
                        openModalWithContent();



                        setTimeout(function() {
                            printModalContent();
                        }, 500);



                        setTimeout(function() {
                            openModalWithkitchen();

                            setTimeout(function() {
                                printModalContent();
                            }, 1000);

                            
                        }, 500);

                       


                    }
                    if (event.keyCode == 27) {

                        if (confirm('Are your sure?')) {
                            window.location = "dashboard.php";

                        }
                    }
                });

                openModalButton.addEventListener("click", () =>
                    openModalWithContent("")

                );

                // Function to print the modal content
                function printModalContent() {

                    const modalContent = modalBody.innerHTML;




                    const printWindow = window.open('', '', 'width=300,height=400');


                    if (printWindow) {
                        printWindow.document.write('<?php require_once('partials/_head.php'); ?><html><head><title>Print</title>');
                        // Set a custom page size that matches your receipt printer's paper size
                        printWindow.document.write('<style media="print">');
                        printWindow.document.write('@page { size: 80mm 270mm;  } body {margin: 0;padding: 0;}');

                        printWindow.document.write('</head><body style="align-items: center;">');
                        printWindow.document.write(modalContent);

                        printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.print();
                        printWindow.close();





                        // swal("Success", "", "success");


                        // window.location = "dashboard.php";


                    } else {
                        console.error('Failed to open the print window.');
                    }

                }



                function printModalkitchen() {

                    const kichen = kichen.innerHTML;

                    const printWindow = window.open('', '', 'width=300,height=400');

                    if (printWindow) {
                        printWindow.document.write('<?php require_once('partials/_head.php'); ?><html><head><title>Print</title>');
                        // Set a custom page size that matches your receipt printer's paper size
                        printWindow.document.write('<style media="print">');
                        printWindow.document.write('@page { size: 80mm 200mm;   } body {margin: 0;padding: 0;  .start-new-page {page-break-before: always;}}');

                        printWindow.document.write('</head><body style="align-items: center;">');
                        printWindow.document.write(kichen);

                        printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.print();
                        printWindow.close();


                        // swal("Success", "", "success");


                        // window.location = "dashboard.php";


                    } else {
                        console.error('Failed to open the print window.');
                    }

                }


                document.addEventListener("keydown", function(event) {

                    const modalBody = document.getElementById("modalBody");
                    if (event.key === "p") {

                        printModalContent();

                    }
                    if (event.keyCode == 75) {
                        openModalWithkitchen();
                    }
                });
            </script>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
        </body>

</html>
<?php
    } else {
        header('Location:"dashboard.php"');
    }
} else {
    include "404.php";
}

?>