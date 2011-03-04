<?php  include 'admin_header.php'; ?>
<?php
//5 November 2010
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

$sitename = $data['sitename'];
$tagline = $data['tagline'];
//$username = $data['username'];

if ($data['Submit'] == 'Update')
{
    //UPDATE `settings` SET `value` = 'Bruce Games Store' WHERE `id` =1 ;
    $sitename_update_query = "update settings set value = '$sitename' where setting = 'sitename'";
    $tagline_update_query = "update settings set value='$tagline' where setting = 'tagline'";
    db_query($sitename_update_query) or die("Update Failed:" . mysql_error());
    db_query($tagline_update_query) or die("Update Failed:" . mysql_error());
}

$select_settings_query = "select setting,value from settings where setting in ('sitename', 'tagline')";
$result = db_query($select_settings_query);
while($row = mysql_fetch_assoc($result))
{
    $$row['setting'] = $row['value'];
}

?>

<h3>Settings</h3>

<?php
include 'views/settings.php';
include 'admin_footer.php';
?>

