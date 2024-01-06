<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');
include('config/pdoconfig.php');

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
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $ret ="SELECT * FROM  rpos_products WHERE prod_id = ? LIMIT 1 "; 
    $statement = $DB_con->prepare($ret);
    $statement->bindParam(1, $update, PDO::PARAM_INT);
    $statement->execute();

    $data = $statement->fetch(PDO::FETCH_ASSOC);
    // $stmt = $mysqli->prepare($ret);
    // $stmt->execute();
    // while ($prod = $res->fetch_object()) {
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
                      <label>Product Name</label>
                      <input type="text" value="<?= $data['prod_name']; ?>" id="prod_name" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Product Code</label>
                      <input type="text" readonly id="prod_code" value="<?= $data['prod_code']; ?>" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Product Image</label>
                      <input type="file" id="prod_img" class="btn btn-outline-success form-control" value="<?= $data['prod_img']; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Product Price</label>
                      <input type="text" id="prod_price" class="form-control" value="<?= $data['prod_price']; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-12">
                      <label>Product Description</label>
                      <textarea rows="5" id="prod_desc" class="form-control"><?= $data['prod_desc']; ?></textarea>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <button onclick="updateProduct()"  class="btn btn-success">Update Product</button>
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
    }
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