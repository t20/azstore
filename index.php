<?php include("header.php"); ?>

<?php

//$pageid = 1;
$scrap = (empty ($_GET['scrap'])) ? 1 : $_GET['scrap'];

// echo 'isset ' . isset($_GET['scrap']) . '<hr/>';
// if (isset($_GET['scrap']))
//     echo 'Is set and ' . $_GET['scrap'];
// else 
//     echo 'Is set False';

$products = get_products($scrap);

echo '<hr/>';

if ($products)
{
include 'views/products.php';
}
?>

<?php include("footer.php"); ?>