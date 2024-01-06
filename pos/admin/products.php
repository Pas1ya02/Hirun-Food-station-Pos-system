<?php
session_start();

include('config/config.php');

include('config/checklogin.php');

require "connection.php";

check_login();
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM  rpos_products  WHERE  prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
  }
}
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
              <a href="add_product.php" class="btn btn-outline-success">
                <i class="fas fa-utensils"></i>
                Add New Product
              </a>
              <a href="add_category.php" class="btn btn-outline-success">
                <i class="fas fa-utensils"></i>
                Add Category
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $product_select = Database::search("SELECT * FROM `rpos_products`");
                  $product_num = $product_select->num_rows;
                  for($x=0;$x < $product_num;$x++){
                    $product_fetch = $product_select->fetch_assoc();
                  ?>
                    <tr>
                      <td>
                        <?php
                        $img = $product_fetch["prod_img"];
                        $path = "assets/img/products/$img";
                        if (isset($img)) {
                          echo "<img src='$path' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $product_fetch["prod_id"]; ?></td>
                      <td><?php echo  $product_fetch["prod_name"]; ?></td>
                      <td>Rs. <?php echo number_format($product_fetch["prod_price"],2)  ?></td>
                      <td>
                        <a href="products.php?delete=<?php echo $product_fetch["prod_id"];?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                        <button class="btn btn-sm btn-primary" onclick="paymentUpdate(<?php echo $product_fetch['prod_id'] ?>);">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script src="script.js"></script>
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
</body>

</html>