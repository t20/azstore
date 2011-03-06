<?php

#TODO
// Check config
// Check for DB connection
// Route to admin/install in failure

include 'settings/config.php';

if (!defined('CONFIG')) 
{
    header("Location: install/index.php");
}

include("header.php");

$connected = db_connect();
if (!$connected)
{
   header("Location: install/index.php");
}

//$pageid = 1;
$scrap = (empty ($_GET['scrap'])) ? 1 : $_GET['scrap'];

// echo 'isset ' . isset($_GET['scrap']) . '<hr/>';
// if (isset($_GET['scrap']))
//     echo 'Is set and ' . $_GET['scrap'];
// else 
//     echo 'Is set False';

?>

<?php 



echo '<hr/>';

$products = get_products($scrap);
if ($products)
{
    include 'views/products.php';
}
?>

<?php include("footer.php"); ?>