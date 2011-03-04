<?php  include 'admin_header.php'; ?>
<?php
// 3 Nov 2010
// Bharadwaj

$message = array();
foreach($_GET as $key => $value) 
{
	$data[$key] = filter($value); //get variables are filtered.
}
foreach($_POST as $key => $value) 
{
	$data[$key] = filter($value); //get variables are filtered.
}
$pageid =  $data['pid']; //pid can be from multiple forms

// Delete Products
if($data['Delete'] == 'Delete')
{
    for ($i=0; $i<count($_POST['asin']);$i++)
    {
        $asin = $_POST['asin'][$i];
        $asin_delete_query = "delete from associations where asin = '". $asin ."' and pageid = '". $pageid ."'";
        db_query($asin_delete_query) or die("Insertion Failed:" . mysql_error());
    }
}

// Query DB with pageid, get values
$select_page_query = "SELECT * from `pages` where `id` = '". $pageid . "'";
$page_query_result = db_query($select_page_query) or die("Query Failed:" . mysql_error());
$page = new page();
while($tmp_page = db_fetch_array($page_query_result))
{
    $page->id = $tmp_page['id'];
    $page->name = $tmp_page['name'];
    $page->maxitems = $tmp_page['maxitems'];
    $page->enabled = $tmp_page['enabled'];
}

$select_asins_query = "select * from associations where pageid = '$pageid'";
$asins_query_result = db_query($select_asins_query) or die("Query Failed:" . mysql_error());
$products = array();
while($tmp_asin = db_fetch_array($asins_query_result)) 
{
    $asin = $tmp_asin['asin'];
    $product = get_product_details($asin);
    $products[] = $product;
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div id="wrapper">    
    <div class="admin_content">
        <h3><?php echo $page->name; ?></h3>
        <div>
            <h4>Products</h4>
            <div>
                <form action="page.php" method="post" accept-charset="utf-8">
                    <?php
                        if ($products)
                        {
                            foreach ($products as $product)
                                {
                                   echo '<div class="aproduct">';
                                   echo '<input type="checkbox" name="asin[]" value="' . $product->asin . '" id="asin">';
                                   echo '<p>' . $product->title . '</p>';
                                   echo '<a href = "' . $product->url . '"><img src = "' . $product->image . '"></a>';
                                   echo '</div>';
                                }
                                echo '<input type="hidden" name="pid" value="'. $pageid .'" id="pid">';
                        }
                    ?>
                <p><input type="submit" name="Delete" id="Delete" value="Delete"></p>
            </form>
            </div>
        </div>
    </div>
</div><!--End wrapper-->

</body>
</html>