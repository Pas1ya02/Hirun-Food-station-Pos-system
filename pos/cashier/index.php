<?php
session_start();
include('config/config.php');
require "connection.php";
//login 
if (isset($_POST['login'])) {

  $staff_email = $_POST['staff_email'];
  $staff_password = sha1(md5($_POST['staff_password'])); //double encrypt to increase security

  $stmt = Database::search("SELECT *  FROM  `rpos_staff` WHERE (`staff_email` ='" . $staff_email . "' AND `staff_password` ='" . $staff_password . "')");
  $n = $stmt->num_rows;
  if ($n == 1) {
    $rs = $stmt->fetch_assoc();
    $_SESSION["staff"] = $rs;

    // Set session timeout to 30 days
    $lifetime =  24 * 60 * 60; // 30 days in seconds
    session_set_cookie_params($lifetime);

    // Start the session
    

    // Store user information in the session
    $_SESSION["staff"] = $rs;

    // Set the last activity time
    $_SESSION['last_activity'] = time();
    

    $shift = Database::search("SELECT * FROM `rpos_shift` WHERE  `rpos_status_id`='1'");

    for ($y = 0; $y < $shift->num_rows; $y++) {
      $shift_data = $shift->fetch_assoc();

      Database::iud("UPDATE `rpos_shift` SET `rpos_status_id` = '2' WHERE `rpos_staff_staff_id`='" . $shift_data["rpos_staff_staff_id"] . "' ");
    }

    if ($rs) {
      //if its sucessfull
      $day = Database::search("SELECT * FROM  `rpos_day` ");
      $rus = $day->num_rows;

      if ($rus == 0) {

        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d H:i:s ');

        $shift = Database::search("SELECT * FROM `rpos_shift`");
        $shift_rs1 = $shift->num_rows;

        if ($shift_rs1 == null && $shift_rs1 == 0) {
          Database::iud("INSERT INTO `rpos_shift`(`start_time`,`end_time`,`rpos_staff_staff_id`,`rpos_status_id`) VALUES('" . $date . "','" . $date . "','" . $rs["staff_id"] . "','1')");
        } else {


          Database::iud("INSERT INTO `rpos_shift`(`start_time`,`end_time`,`rpos_staff_staff_id`,`rpos_status_id`) VALUES('" . $date . "','" . $date . "','" . $rs["staff_id"] . "','1')");
        }

        header("location:daystart.php");
      } else {

        date_default_timezone_set('Asia/Colombo');
        $date1 = date('Y-m-d H:i:s ');

        $shift1 = Database::search("SELECT * FROM `rpos_shift`");
        $shift_rs = $shift1->num_rows;

        if ($shift_rs == null && $shift_rs == 0) {
          Database::iud("INSERT INTO `rpos_shift`(`start_time`,`end_time`,`rpos_staff_staff_id`,`rpos_status_id`) VALUES('" . $date1 . "','" . $date1 . "','" . $rs["staff_id"] . "','1')");
        } else {

          $shift12 = Database::search("SELECT * FROM `rpos_shift` WHERE  `rpos_status_id`='2'");

          if (!($shift12 == null)) {
            for ($y = 0; $y < $shift12; $y++) {
              $shift_data1 = $shift12->fetch_assoc();

              Database::iud("UPDATE `rpos_shift` SET `rpos_status_id` = '2' WHERE `rpos_staff_staff_id`='" . $shift_data1["rpos_staff_staff_id"] . "' ");
            }
            Database::iud("INSERT INTO `rpos_shift`(`start_time`,`end_time`,`rpos_staff_staff_id`,`rpos_status_id`) VALUES('" . $date1 . "','" . $date1 . "','" . $rs["staff_id"] . "','1')");
          }
        }


        header("location:dashboard.php");
      }
    } else {
      $err = "Incorrect Authentication Credentials ";
    }
  } else {
    $err = "Incorrect Authentication Credentials ";
  }
}
require_once('partials/_head.php');
?>


<body class="bg-dark">
  <div class="main-content">

    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Point Of Sale Management System</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" required name="staff_email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required name="staff_password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary my-4">Log In</button>
                </div>
              </form>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="../admin/forgot_pwd.php" target="_blank" class="text-light"><small>Forgot password?</small></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Footer -->
  <?php
  require_once('partials/_footer.php');
  ?>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>