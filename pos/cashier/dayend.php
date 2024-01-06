<?php
session_start();

require "connection.php";
require_once('partials/_head.php');

if (isset($_SESSION["staff"])) {
  $status = $_SESSION["staff"]["staff_id"];
  $staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
  $staff = $staff_name->fetch_assoc();
  $staffname = $staff["staff_name"];

  date_default_timezone_set('Asia/Colombo');
  $date = date('Y-m-d H:i:s');
  $date1 = date('Y-m-d ');

  $start_amount = Database::search("SELECT * FROM `rpos_day` ");
  $start_amount_data = $start_amount->fetch_assoc();


?>



  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
      font-size: 14px;
    }
  </style>
  </head>

  <body>

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
      <a href="dashboard.php" class="menu-btn">Back to POS</a>
      <a href="dayEntry.php" class="menu-btn">My Sale List</a>
      <a href="dayend.php" class="menu-btn">Day End Report</a>
    </div>
    <div class="contaner">

      <div class="row">

        <table style="margin: auto;">
          <tbody>

            <tr style="color: red;">
              <td colspan="" class="font-weight-bold">Enter your hand count amount and<br>complete current shift</td>
            </tr>


            <tr>
              <td colspan="" class="">

                <input name="Start_balance_end_amount" class="form-control mx-auto" type="number" required="required" id="Start_balance_end_amount" value="<?php echo $start_amount_data["start_amount"] + $total_sale  ?>">
                <a class="btn btn-success mt-1" onclick='dayend();'>Submit</a> <button class="btn btn-danger  mt-1" name="end_btn" onclick="downloadPDF();">ScreenShot</button>
              </td>

            </tr>

            <?php
            $shift = Database::search("SELECT * FROM `rpos_shift` WHERE  CAST(`start_time` AS DATE) = '" . $date1 . "' ");
            $ys = 0;
            for ($i = 0; $i < $shift->num_rows; $i++) {
              $shift_data = $shift->fetch_assoc();

              $shift_has_payment = Database::search("SELECT * FROM `rpos_payments_has_rpos_shift` WHERE `rpos_shift_shift_id`='" . $shift_data["shift_id"] . "'");

              $cash = 0;
              $card = 0;
              $cas = 0;
              $car = 0;

              for ($x = 0; $x < $shift_has_payment->num_rows; $x++) {
                $shift_has_payment_data = $shift_has_payment->fetch_assoc();

                $payments = Database::search("SELECT * FROM `rpos_payments` WHERE `pay_id`='" . $shift_has_payment_data["rpos_payments_pay_id"] . "' ");

                $payment_data = $payments->fetch_assoc();

                if ($payment_data["payment_method_id"] == 1) {
                  $cash = $cash + $payment_data["pay_amt"];
                  // echo $cash;

                }
                if ($payment_data["payment_method_id"] == 2) {
                  $card = $card + $payment_data["pay_amt"];
                  // echo $card;

                }
                if ($payment_data["payment_method_id"] == 3) {
                  $cash_card = Database::search("SELECT sum(`cash`),sum(`card`) FROM `day_summery_method` WHERE `order_code` = '" . $payment_data["order_code"] . "' ");
                  $cas_card_data = $cash_card->fetch_assoc();

                  $cas = $cas + $cas_card_data["sum(`cash`)"];
                  $car = $car + $cas_card_data["sum(`card`)"];
                }
              }
              $cash1 = $cash + $cas;
              $card1 = $card + $car;
              $total_sale = $cash1 + $card1;

            ?>
              <div id="content">
                <tr>
                  <td colspan="">&nbsp;</td>
                </tr>

                <tr>
                  <td>Shift ID : </td>
                  <td>#<?php echo $shift_data["shift_id"]; ?></td>
                </tr>
                <tr>
                  <td>Start Time : </td>
                  <td><?php echo $shift_data["start_time"]; ?></td>
                </tr>
                <tr>
                  <td>End Time : </td>
                  <td><?php echo $shift_data["end_time"]; ?></td>
                </tr>
                <tr>
                  <td>User : </td>
                  <td><?php echo $staffname; ?></td>
                </tr>

                <?php

                $pay = Database::search("SELECT * FROM `rpos_payments_has_rpos_shift` WHERE `rpos_shift_shift_id`='" . $shift_data["shift_id"] . "' ");
                $total = 0;
                for ($y = 0; $y < $pay->num_rows; $y++) {
                  $pay_data = $pay->fetch_assoc();

                  $paymet_shift = Database::search("SELECT * FROM `rpos_payments` WHERE `pay_id`='" . $pay_data["rpos_payments_pay_id"] . "' ");

                  $tot = $paymet_shift->fetch_assoc();
                  $total = $total + $tot["pay_amt"];
                }
                ?>
                <tr>
                  <td>Total Sale</td>
                  <td><?php echo number_format($total, 2) ?>
                  </td>

                </tr>
              <?php
              $ys = $ys + $total;
            }

            $cash_in_hand = $start_amount_data["start_amount"] + $ys;
              ?>
              <tr>


              </tr>

              <tr>

                <td>Start Amount</td>

                <td align="right"><?php echo  number_format($start_amount_data["start_amount"], 2); ?></td>

              </tr>


              <tr>
                <td>Total Cash Sale</td>
                <td align="right"><?php echo number_format($cash1, 2) ?></td>
              </tr>

              <tr>
                <td>Total Card Sale</td>
                <td align="right"><?php echo number_format($card1, 2) ?></td>
              </tr>

              <tr>
                <td>Total Sale</td>
                <td align="right"><?php echo number_format($ys, 2) ?>
                </td>
              </tr>

              <tr>
                <td>Cash in hand</td>
                <td align="right"><?php echo number_format($cash_in_hand, 2) ?></td>
              </tr>

              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>



              </div>




          </tbody>
        </table>


      </div>
    </div>
    <script src="html2pdf.bundle.min.js"></script>
    <script>
      function dayend() {
        var x = "hi";

        if (confirm('Are your sure?')) {

          var form = new FormData();
          form.append("x", x);


          var r = new XMLHttpRequest();

          r.onreadystatechange = function() {
            if (r.readyState == 4) {
              var t = r.responseText;
              if (t === "Success") {
                alert("DAY ENDED !");
                window.location = "index.php";
              }
            }
          }

          r.open("POST", "day_end_process.php", true);
          r.send(form);

        }
      }

      function downloadPDF() {
        const element = document.body;

        // Use html2pdf library to generate PDF
        html2pdf(element);
      }
    </script>

  </body>

  </html>
<?php
} else {
  include "404.php";
}
?>