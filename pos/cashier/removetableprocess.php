<?php
require "connection.php";

if (isset($_POST["ordercode"])) {

$order_code = $_POST["ordercode"];  


Database::iud("DELETE FROM `rpos_dining` WHERE `ordercode` = '".$order_code."' ");

echo "deleted";


}



?>