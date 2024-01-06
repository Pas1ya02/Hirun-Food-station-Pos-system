<?php
session_start();

include('config/config.php');

include('config/checklogin.php');

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

                            <a href="add_table.php" class="btn btn-outline-success">
                                <i class="fas fa-utensils"></i>
                                Add Table
                            </a>
                            <div class="row">

                                <form  class="col-lg-6 col-sm-12 m-auto card pb-2" autocomplete="off">

                                    <table class="table-sm">
                                        <?php
                                        $bill = Database::search("SELECT * FROM `rpos_bill` ");
                                        $bill_data = $bill->fetch_assoc();
                                        ?>
                                        <tbody>

                                            <!-- <tr>
                                            <td align="left" valign="middle">Print</td>
                                            <td align="left" valign="middle">
                                                <select name="bill_pint" required="required" class="form-control form-control-sm" id="bill_pint">
                                                    <option selected value="1">On</option>
                                                    <option value="0">Off</option>
                                                </select>
                                            </td>
                                        </tr> -->

                                            <tr>
                                                <td align="left" valign="middle"><label><input  type="checkbox" value="open" id="bill_logo_display" name="check" checked> Bill Logo Image</label></td>
                                                <td align="left" valign="middle"><img src="<?php echo $bill_data["bill_logo"]  ?>" style="width: 80px; height: 80px; object-fit: contain; border: 1px solid #CCCCCC; padding: 5px;"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle"><label> Bill Title</label></td>
                                                <td align="left" valign="middle"><input  type="text" required="required" class="form-control form-control-sm" id="bill_title" value="<?php echo $bill_data["bill_title"]  ?>"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle"><label> Bill Address</label></td>
                                                <td align="left" valign="middle"><textarea  rows="4" required="required" class="form-control form-control-sm" id="bill_address"><?php echo $bill_data["bill_address"]  ?>
                                            </textarea>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle"><label> Bill Mobile</label></td>
                                                <td align="left" valign="middle"><input type="text" required="required" class="form-control form-control-sm" id="bill_mobile" value="<?php echo $bill_data["bill_mobile"]  ?>"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle">Discount (%)</td>
                                                <td align="left" valign="middle"><input  type="number" min="0" max="100" required="required" class="form-control form-control-sm" id="discount" value="<?php echo $bill_data["discount"]  ?>"></td>
                                            </tr>

                                            <tr>
                                                <td align="left" valign="middle">Service Charge (%)</td>
                                                <td align="left" valign="middle"><input  type="number" min="0" max="100" required="required" class="form-control form-control-sm" id="service_charge" value="<?php echo $bill_data["service_charge"]  ?>"></td>
                                            </tr>

                                            <tr>
                                                <td align="left" valign="middle">Bill Footer Text</td>
                                                <td align="left" valign="middle"><textarea  rows="4" required="required" class="form-control form-control-sm" id="bill_footer_text"><?php echo $bill_data["bill_footer"]  ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle">&nbsp;</td>
                                                <td align="right" valign="middle"><button onclick="billinfo();"  class="btn btn-sm btn-info mt-2">Save Setting</button></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </form>

                            </div>
                            <div class="row mt-4">

                                <form  class="col-lg-6 col-sm-12 m-auto card pb-2">

                                    <table class="table-sm">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" align="left" valign="middle"><strong>System Backup</strong></td>
                                            </tr>

                                            <!-- <tr>
                                            <td align="left" valign="middle">Backup notification every 7 days</td>
                                            <td align="left" valign="middle">
                                                <select name="backup_notification" required="required" class="form-control form-control-sm" id="backup_notification">
                                                    <option value="1">On</option>
                                                    <option selected value="0">Off</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="left" valign="middle">&nbsp;</td>
                                            <td align="right" valign="middle"><button name="save_backup_setting" type="submit" class="btn btn-sm btn-info mt-2">Save Setting</button></td>
                                        </tr> -->

                                        </tbody>
                                </form>

                                <form >
                                    <tbody>
                                        <tr>
                                            <td align="left" valign="middle">&nbsp;</td>
                                            <td align="right" valign="middle"><a href="backup.php" class="btn btn-sm btn-success mt-2">Backup Data</a></td>
                                        </tr>
                                    </tbody>
                                </form>

                                </table>


                            </div>
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