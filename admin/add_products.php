<?php

// Author : Bharadwaj
// Date : 16 Sep 2010

include '../includes/functions.php';

$products = null;

$add_type = $_GET['add_type'];
$pid = $_GET['pid'];
if ($add_type == 1)
{
    // add by keyword
    $keyword = $_GET['keyword'];
    echo 'Searching by keyword : ' . $keyword;
    $products = get_products_by_keyword ($keyword);
}
else
{
    // duplicate
}
?>

<div id = "add_form">
    <?php include_once ('views/add_product.php'); ?>
</div>

<form action="process.php" method="post" accept-charset="utf-8">
    <?php
        if ($products)
        {
            foreach ($products as $product)
            {
                echo '<div class="aproduct">';
                echo '<input type="checkbox" name="asin[]" value="' . $product['asin'] . '" id="asin">';
                echo $product['title'];
                echo '<a href = "' . $product['url'] . '"><img src = "' . $product['image'] . '"></a>';
                echo '</div>';
            }
            echo '<p>Adding to Page '. $pid .'</p>';
            echo '<input type="hidden" name="pid" value="'. $pid .'" id="pid">';
        }
    ?>
    <p><input type="submit" value="Add products"></p>
</form>