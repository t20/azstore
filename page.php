<?php include("header.php"); ?>

<?php

//$pageid = 1;
$scrap = (empty ($_GET['scrap'])) ? 1 : $_GET['scrap'];

$select_asins_query = "select * from associations where pageid = '$scrap' limit 10";
$asins_query_result = db_query($select_asins_query) or die("Query Failed:" . mysql_error());
$products = array();
while($tmp_asin = db_fetch_array($asins_query_result)) 
{
    $asin = $tmp_asin['asin'];
    $product = get_product_details($asin);
    $products[] = $product;
}

echo '<hr/>';

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