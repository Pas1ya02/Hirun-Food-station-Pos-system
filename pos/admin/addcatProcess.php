<?php
require "connection.php";

$cat = $_POST['cat'];
Database::iud("INSERT INTO `rpos_catergory` (`name`) VALUES ('" . $cat . "')");

echo "ok";


?>