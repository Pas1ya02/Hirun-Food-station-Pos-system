<?php
require "connection.php";

$tab = Database::search("SELECT * FROM `rpos_dining`");
$tab_num = $tab->num_rows;
?>


<h4 style="margin: 0; padding: 0;">Pending <span id=""><span style="background-color: white; color: black; padding: 10px; border-radius: 10%; width: 50px; height: 50px;"><?php echo $tab_num ?></span></span></h4>


