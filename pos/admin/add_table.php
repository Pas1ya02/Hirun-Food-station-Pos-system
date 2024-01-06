<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');
require "connection.php";
check_login();

require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                <div class="col-md-6">
                    <?php 
                    $table =Database::search("SELECT  max(`table_id`) AS max FROM `rpos_table`");
                    $table_data =$table->fetch_assoc();
                     $t=$table_data["max"]+1;
                     

                    ?>
                    <label>Table Number</label>
                    <input type="text" id="tab_id" value="<?php echo $t ?>" class="form-control" >
                  </div>
                  <div class="col-md-6">
                    <label>Table Name</label>
                    <input type="text" id="tab_name" class="form-control">
                  </div>
                 
                </div>
               
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <button onclick="addtable();" class="btn btn-success">Add Table</button>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script src="script.js"></script>
</body>

</html>