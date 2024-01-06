<?php

require "connection.php";

// Get the product category from the POST request.
$product_category = $_POST["product_category"];

// Execute a SQL query to get all products with the specified category.
if ($product_category == 'all') {
    $sql = Database::search("SELECT * FROM `rpos_products`");
    $row = $sql->num_rows;
    for ($z = 0; $z < $row; $z++) {
        $result = $sql->fetch_assoc();
        $p_img = $result["prod_img"];

?>
        <div class="product-sub" onclick="JavaScript:list_value_send(<?php echo $result['prod_id']; ?> );">
            <div class="product_price bg-dark"><?php echo $result['prod_price']; ?></div>
            <?php
            if (isset($p_img)) {
            ?>
                <img src="/pos/admin/assets/img/products/<?php echo $p_img ?>" style="height: 100px; object-fit: cover;">

            <?php    } else { ?>
                <img src="/pos/admin/assets/img/products/default.jpg" style="height: 100px; object-fit: cover;">

            <?php } ?> <div class="product-name "><?php echo $result['prod_name']; ?></div>
        </div>
    <?php } ?>
    <?php
} else {
    $sql1 = Database::search("SELECT * FROM `rpos_products` WHERE `rpos_catergory_id` = '" . $product_category . "' ");
    $row1 = $sql1->num_rows;
    for ($i = 0; $i < $row1; $i++) {
        $result = $sql1->fetch_assoc();
        $p_img = $result["prod_img"];

    ?>
        <div class="product-sub" onclick="JavaScript:list_value_send(<?php echo $result['prod_id']; ?> );">
            <div class="product_price bg-dark"><?php echo $result['prod_price']; ?></div>
            <?php
            if (isset($p_img)) {
            ?>
                <img src="/pos/admin/assets/img/products/<?php echo $p_img ?>" style="height: 100px; object-fit: cover;">

            <?php    } else { ?>
                <img src="/pos/admin/assets/img/products/default.jpg" style="height: 100px; object-fit: cover;">

            <?php } ?> <div class="product-name "><?php echo $result['prod_name']; ?></div>
        </div>
<?php
    }
}
?>