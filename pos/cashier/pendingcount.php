<?php
include 'connection.php';
$pendingcount = Database::search("SELECT * FROM `rpos_dining`");
$pendingcount_num = $pendingcount->num_rows;


if ($pendingcount_num == 0 && $pendingcount_num == null) {
?>
    <span style="background-color: white; color: black; padding: 10px; border-radius: 10%; width : 50px; height: 50px;">0</span>

<?php
} else {
?>
    <span style="background-color: white; color: black; padding: 10px; border-radius: 10%; width : 50px; height: 50px;"><?php echo $pendingcount_num ?></span>

<?php
}
?>