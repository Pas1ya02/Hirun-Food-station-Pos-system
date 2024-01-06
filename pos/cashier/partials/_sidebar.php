<?php
$staff_id = $_SESSION['staff_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  rpos_staff  WHERE staff_id = '$staff_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($staff_id = $res->fetch_object()) {

?>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
        <img src="../admin/assets/img/brand/repos.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="../admin/assets/img/brand/repos.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customes.php">
              <i class="fas fa-users text-primary"></i> Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <i class="ni ni-bullet-list-67 text-primary"></i>Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <i class="ni ni-cart text-primary"></i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payments.php">
              <i class="ni ni-credit-card text-primary"></i> Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receipts.php">
              <i class="fas fa-file-invoice-dollar text-primary"></i> Receipts
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reporting</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="orders_reports.php">
              <i class="fas fa-shopping-basket"></i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payments_reports.php">
              <i class="fas fa-funnel-dollar"></i> Payments
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt text-danger"></i> Log Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php } ?>

<datalist id="product_list">
	  <option value="Lu01">Lu01 -  Rice &amp; Curry |  Rice &amp; Curry</option>
	  <option value="150">150 -  Water bottle 500ml |  Water bottle 500ml</option>
	  <option value="140">140 - 02 Scoop Ice Cream | 02 Scoop Ice Cream</option>
	  <option value="156">156 - Avocado Juice | Avocado Juice</option>
	  <option value="B1">B1 - Beef Deviled  | Beef Deviled </option>
	  <option value="154">154 - Black Coffee | Black Coffee</option>
	  <option value="153">153 - Black Tea | Black Tea</option>
	  <option value="167">167 - Breakfast  | Breakfast </option>
	  <option value="135">135 - Cheese &amp; Chicken Omelet | Cheese &amp; Chicken Omelet</option>
	  <option value="in01">in01 - Chicken | chicken</option>
	  <option value="158">158 - Chicken 1kg BBQ | Chicken 1kg BBQ</option>
	  <option value="cho2">cho2 - Chicken Chopsuey | Chicken Chopsuey</option>
	  <option value="122">122 - Chicken Chopsuey Rice  | Chicken Chopsuey Rice </option>
	  <option value="163">163 - Chicken Curry | Chicken Curry</option>
	  <option value="119">119 - Chicken Devilled | Chicken Devilled</option>
	  <option value="129">129 - Chicken Fried Rice  | Chicken Fried Rice </option>
	  <option value="118">118 - Chicken Grill | Chicken Grill</option>
	  <option value="chn1">chn1 - Chicken Noodles  | Chicken Noodles </option>
	  <option value="136">136 - Chicken Omelet | Chicken Omelet</option>
	  <option value="143">143 - Coca Cola 400ml | Coca Cola 400ml</option>
	  <option value="102">102 - Cream Caramel | Cream Caramel</option>
	  <option value="138">138 - Cream Caramel | Cream Caramel</option>
	  <option value="141">141 - Curt &amp; Honey | Curt &amp; Honey</option>
	  <option value="pa01">pa01 - Deviled Prawns | Deviled Prawns</option>
	  <option value="114">114 - Devilled Cuttle fish | Devilled Cuttle fish</option>
	  <option value="112">112 - Devilled Fish | Devilled Fish</option>
	  <option value="164">164 - Dhal Curry | Dhal Curry</option>
	  <option value="144">144 - EGB 400ml | EGB 400ml</option>
	  <option value="107">107 - Egg Broth | Egg Broth</option>
	  <option value="132">132 - Egg Fried Rice  | Egg Fried Rice </option>
	  <option value="E3">E3 - Egg Noodles | Egg Noodles</option>
	  <option value="103">103 - Ella Club | Ella Club</option>
	  <option value="F3">F3 - Fish Stew | Fish Stew</option>
	  <option value="flower 2">flower 2 - Flower bookey with paper | Flower bookey with paper</option>
	  <option value="F01">F01 - Flower bouquets  | Flower bouquets </option>
	  <option value="101">101 - French Fries | French Fries</option>
	  <option value="137">137 - Fried Egg (01 Nos Egg) | Fried Egg (01 Nos Egg)</option>
	  <option value="F2">F2 - Fried fish | Fried fish</option>
	  <option value="po2">po2 - Fried Pork | Fried Pork</option>
	  <option value="117">117 - Hot Butter / Hot Garlic Sauce | </option>
	  <option value="113">113 - Hot Butter Cuttle fish | Hot Butter Cuttle fish</option>
	  <option value="115">115 - Hot Butter Cuttle fish | Hot Butter Cuttle fish</option>
	  <option value="pa3">pa3 - Hot butter prawns | Hot butter prawns</option>
	  <option value="147">147 - Ice Coffee | Ice Coffee</option>
	  <option value="L1">L1 - L/L | L/L</option>
	  <option value="l003">l003 - Lemon With Spiry | Lemon With Spiry</option>
	  <option value="146">146 - Lime Coke / Lime Sprit / Lime Soda | </option>
	  <option value="151">151 - Masala Tea | Masala Tea</option>
	  <option value="152">152 - Milk Coffee | Milk Coffee</option>
	  <option value="M1">M1 - Milk rice  | Milk rice</option>
	  <option value="T1">T1 - Milk Tea | Milk Tea</option>
	  <option value="149">149 - Mineral Water 1ltr | Mineral Water 1ltr</option>
	  <option value="131">131 - Mix Fried Rice  | Mix Fried Rice </option>
	  <option value="120">120 - Mix Grill | Mix Grill</option>
	  <option value="Mcn1">Mcn1 - Mixed Chopsuey  Noodles | Mixed Chopsuey  Noodles</option>
	  <option value="128">128 - Mixed Chopsuey Rice | Mixed Chopsuey Rice</option>
	  <option value="157">157 - Mixed Fruit Juice | </option>
	  <option value="109">109 - Mixed Latus Salad | </option>
	  <option value="MN06">MN06 - Mixed Noodles | Mixed Noodles</option>
	  <option value="161">161 - Mixed stick | </option>
	  <option value="134">134 - Omelet | Omelet</option>
	  <option value="155">155 - Papaya/Watermelon/Pineapple/Banana/Lime | </option>
	  <option value="P1">P1 - Passion Juice | Passion Juice</option>
	  <option value="PO1">PO1 - Pork Deviled | Pork Deviled</option>
	  <option value="PO03">PO03 - Pork Grill | Pork Grill</option>
	  <option value="Po04">Po04 - Pork Stew | Pork Stew</option>
	  <option value="159">159 - Pork. BBQ1 kg | Pork. BBQ1 kg</option>
	  <option value="110">110 - Red Cabbage &amp; Mayonnaise Salad | </option>
	  <option value="cake1">cake1 - Red Cake 1pcs | Red Cake 1pcs</option>
	  <option value="L2">L2 - Rice &amp; Curry (Lunch) | Rice &amp; Curry (Lunch)</option>
	  <option value="RK1">RK1 - Rice Kiri samba | Rice Kiri samba</option>
	  <option value="108">108 - Ro-yo Green Salad | </option>
	  <option value="s01">s01 - salt | salt</option>
	  <option value="160">160 - Sausages 400g | </option>
	  <option value="100">100 - Sausages Grilled / Devilled (06 Nos) | Sausages Grilled / Devilled (06 Nos)</option>
	  <option value="166">166 - Scrambled Eggs | Scrambled Eggs</option>
	  <option value="127">127 - Seafood Chopsuey | </option>
	  <option value="123">123 - Seafood Chopsuey Rice / Noodles | eafood Chopsuey Rice / Noodles</option>
	  <option value="130">130 - Seafood Fried Rice / Noodles | Seafood Fried Rice / Noodles</option>
	  <option value="145">145 - Soda | </option>
	  <option value="142">142 - Sprite 1.5ltr | Sprite 1.5ltr</option>
	  <option value="Sp4">Sp4 - Sprite 1ltr | sprite 1 ltr</option>
	  <option value="sp 2">sp 2 - Sprite 400ml | sprite 400ml</option>
	  <option value="106">106 - Tom Yom Soup (Sea Food) | </option>
	  <option value="104">104 - Vegetable Broth | Vegetable Broth</option>
	  <option value="125">125 - Vegetable Chopsuey | </option>
	  <option value="121">121 - Vegetable Chopsuey Rice / Noodles | Vegetable Chopsuey Rice / Noodles</option>
	  <option value="133">133 - Vegetable Fried Rice  | Vegetable Fried Rice</option>
	  <option value="v12">v12 - Vegetable Noodles | Vegetable Noodles</option>
	  <option value="w1">w1 - W W 750ml | W W750ml</option>
	  <option value="139">139 - Watalappan | </option>
	  <option value="y1">y1 - Yogurt | Yogurt</option>
	</datalist>