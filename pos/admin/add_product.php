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
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Product Name</label>
                    <input type="text" id="prod_name" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Product Code</label>
                    <input type="text" id="prod_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Product Image</label>
                    <input type="file" id="prod_img"  class="btn btn-outline-success form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Product Price</label>
                    <input type="text" id="prod_price" class="form-control">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Select Category</label>
                  <!--  <input type="file" name="s_category" class="btn btn-outline-success form-control" value=""> -->
                    <select id="s_category" class="btn btn-outline-success form-control">
                      <option value="0">--Please choose an option--</option>
                      <?php $i = Database::search("SELECT * FROM `rpos_catergory`");
                      $in = $i->num_rows;
                      for($X = 0; $X < $in; $X++){
                        $iF = $i->fetch_assoc();
                      ?>
                      <option value="<?php echo $iF["id"]; ?>"><?php echo $iF["name"] ?></option>
                    <?php } ?>
                      </select>
                  </div>
                 
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Product Description</label>
                    <textarea rows="5" id="prod_desc" class="form-control"></textarea>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <button onclick="addProduct();" class="btn btn-success">Add Product</button>
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
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script src="script.js"></script>
</body>

</html>