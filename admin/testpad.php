<?php

include '../settings/config.php';
include '../includes/functions.php';
include '../includes/models/models.php';

// B000IMWK2G

$product = get_product_details("B000IMWK2G");

echo '<hr/>';
echo $product->asin;


?>