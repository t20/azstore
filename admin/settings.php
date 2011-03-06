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
$username = $data['username'];
$password = $data['password'];

if ($data['Submit'] == 'Update')
{
    //UPDATE `settings` SET `value` = 'Bruce Games Store' WHERE `id` =1 ;
    $userid = $_SESSION['user_id'];
    $sitename_update_query = "update settings set value = '$sitename' where setting = 'sitename'";
    $tagline_update_query = "update settings set value='$tagline' where setting = 'tagline'";
    $username_update_query = "update users set user_name = '$username' where id='$userid'";
    db_query($sitename_update_query) or die("Update Failed:" . mysql_error());
    db_query($tagline_update_query) or die("Update Failed:" . mysql_error());
    db_query($username_update_query) or die("Update Failed:" . mysql_error());
    if ($password)
    {
        $password_update_query = "update users set pwd = sha1('$password') where id='$userid'";
        db_query($password_update_query) or die("Update Failed:" . mysql_error());
    }
    
}

$select_settings_query = "select setting,value from settings where setting in ('sitename', 'tagline')";
$result = db_query($select_settings_query);
while($row = mysql_fetch_assoc($result))
{
    $$row['setting'] = $row['value'];
}

$username = '';
$select_user_query = "select user_name from users where id = '". $_SESSION['user_id'] . "'";

$result = db_query($select_user_query);
while($row = mysql_fetch_assoc($result))
{
    $username = $row['user_name'];
}
?>

<h3>Settings</h3>

<?php
include 'views/settings.php';
include 'admin_footer.php';
?>

