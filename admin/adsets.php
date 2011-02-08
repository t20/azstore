<?php  include 'admin_header.php'; ?>
<?php

echo '<hr/>';

// to do 
// I have looked at multiple PHP ORM libraries that will help simplify this process.
// The cloest ones that look promising are redbeanphp, pork db and idiorm.
// AS of now, I continue working on this project without a ORM layer.


$adsets_query = db_query("SELECT * FROM adsets");
$adsets = null;
while($adset = db_fetch_array($adsets_query)) {
	//Return each adset title seperated by a newline.
    $aadset = new adset();	
    $aadset->id = $adset['id'];
    $aadset->name = $adset['name'];
    $aadset->pageid = $adset['pageid'];
    $adsets[] = $aadset;
}

include 'views/adsets.php';

?>

<?php include 'admin_footer.php'; ?>