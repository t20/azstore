<?php
//5 November 2010
// Bharadwaj

include '../includes/functions.php';
include '../settings/config.php';
include '../includes/database.php';

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
    db_query($sitename_update_query) or die("Insertion Failed:" . mysql_error());
    db_query($tagline_update_query) or die("Insertion Failed:" . mysql_error());    
}

$select_settings_query = "select setting,value from settings where setting in ('sitename', 'tagline','username')";
$result = db_query($select_settings_query);
while($row = mysql_fetch_assoc($result))
{
    $$row['setting'] = $row['value'];
}

?>

<form action="settings.php" method="post" accept-charset="utf-8">
    <label for="sitename">Site Name</label><input type="text" name="sitename" value="<?php echo $sitename; ?>" id="sitename">
    <label for="tagline">Tag Line</label><input type="text" name="tagline" value="<?php echo $tagline; ?>" id="tagline">
    <label for="username">User name</label><input type="text" name="username" value="<?php echo $username; ?>" id="username">
   <label for="password">Password</label><input type="password" name="password" value="" id="password">
   
    <p><input type="submit" name="Submit" id="Submit" value="Update"></p>
</form>
<h3>Themes</h3>
