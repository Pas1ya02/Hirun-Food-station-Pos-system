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
    $date = date('Y-m-d ');
?>





    <div style="width: 450px; margin: auto; margin-top: 5%; text-align: center; background-color: rgba(135,206,235,0.5); padding: 10px;">
        <form method="post" autocomplete="off">
            <h4>Enter Your Day Start Balance<br><br>
                Valid Date: <strong><?php echo $date ?></strong><br>
                Start User: <strong><?php echo $staffname; ?></strong>
            </h4><br>
            <table>
                <tbody>
                    <tr>
                        <td><input id="Start_balance_start_amount" type="text" class="form-control" placeholder="Amount LKR" required></td>
                        <td><div  type="submit" class="btn btn-success ml-2" style="white-space: nowrap;">Enter Amount</div></td>
                        <td><a href="index.php" class="btn btn-dark ml-2">Cancel</a></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        document.addEventListener("keydown", function(event) {
            if (event.keyCode == "13") {

                day();

            }
        });

        window.addEventListener("load", function() {
            document.getElementById("Start_balance_start_amount").focus();

        });

        function day() {
            var daystart = document.getElementById("Start_balance_start_amount").value;

            var form = new FormData();
            form.append('daystart', daystart);

            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var t = r.responseText;

                    if (t == "ok") {
                        window.location = "dashboard.php";
                    }

                }
            }

            r.open("POST", "daystartprocess.php", true);
            r.send(form);



        }
    </script>



<?php

} else {
    echo ("fuv");
}

?>