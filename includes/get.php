<?php include("header.php"); ?>

<?php
include 'settings/config.php';
include 'includes/database.php';
include 'includes/functions.php';
include 'includes/models/models.php';

//$pageid = 1;
$scrap = (empty ($_GET['scrap'])) ? 1 : $_GET['scrap'];

$select_asins_query = "select * from associations where pageid = '$scrap'";
$asins_query_result = db_query($select_asins_query) or die("Query Failed:" . mysql_error());
$products = array();
while($tmp_asin = db_fetch_array($asins_query_result)) 
{
    $asin = $tmp_asin['asin'];
    $product = get_product_details($asin);
    $products[] = $product;
}

if ($products)
{
    foreach ($products as $product)
        {
           echo '<div class="aproduct">';
           echo $product->title;
           echo '<a href = "' . $product->url . '"><img src = "' . $product->image . '"></a>';
           echo '</div>';
        }
}
?>

<?php include("footer.php"); ?>