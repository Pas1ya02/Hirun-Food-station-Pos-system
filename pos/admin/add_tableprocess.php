<?php
require "connection.php";

$id = $_POST['id'];
$name = $_POST['name'];

Database::iud("INSERT INTO `rpos_table` (`table_id`,`table_name`) VALUES ('" . $id . "','" . $name . "')");

echo "success";
?>