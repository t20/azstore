<?php include("header.php"); ?>

<?php

//$pageid = 1;
$scrap = (empty ($_GET['scrap'])) ? 1 : $_GET['scrap'];
$limit =10;
$products = get_products($scrap, $limit);

echo '<hr/>';

if ($products)
{
   include 'views/products.php';
}
?>

<?php include("footer.php"); ?>