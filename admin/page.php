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

// Delete Page
if ($data['deletepage'] == 'Delete Page')
{
    $page_delete_query = "delete from pages where id = $pageid";
    db_query($page_delete_query) or die("Insertion Failed:" . mysql_error());
    header("Location: index.php?message=delete&pid=$pageid");
}

// Update Page
if($data['update'] == 'Update')
{
    $pid = $data['pid'];
    $name = $data['page_name'];
    $maxitems = $data['maxitems'];
    $enabled = $data['enabled'];
    
    $page_update_query = "update pages set name='$name', maxitems = '$maxitems', enabled='$enabled' where id='$pid'";
    db_query($page_update_query) or die("Insertion Failed:" . mysql_error());
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
        <h4>Edit page</h4>
            <form action="page.php" method="get" accept-charset="utf-8">
                <label for="page_name">Page Name</label>
                <input type="text" name="page_name" value="<?php echo $page->name; ?>" id="page_name"><br/> 
                <!--TODO Remove BR tag here and style with CSS-->
                <label for="maxitems">Max Items</label>
                <input type="text" name="maxitems" value="<?php echo $page->maxitems; ?>" id="maxitems"><br/>
                <label for="enabled">Enabled</label>
                <input type="checkbox" name="enabled" value="1" id="enabled" <?php if ($page->enabled) echo 'checked="checked"'; ?> >
                <input type="hidden" name="pid" value="<?php echo $pageid; ?>" id="pid">
                <input type="submit" name="update" id="update" value="Update">
            </form>
        <h4>Delete page</h4>
            <form action="page.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="pid" value="<?php echo $pageid; ?>" id="pid">
                <input type="submit" name="deletepage" id="deletepage" value="Delete Page" onclick="return confirm('Do you want to delete the page?')">
            </form>
    </div>
</div><!--End wrapper-->

</body>
</html>