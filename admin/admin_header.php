<?php
    include '../settings/config.php';
    include '../includes/database.php';
    include '../includes/models/models.php';
    include '../includes/functions.php';


is_logged_in();

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div id="wrapper">
    <div id="admin_level1">
        <div id="admin_site_name">
            <?php $settings = get_settings(); ?>
            <div id="sitename"><a href="index.php">Admin Section - <?php echo $settings['sitename']; ?> </a></div>
        </div>
        <div id="admin_logout"><a href = "logout.php">Logout</a></div>
        <div class="clear"></div>
    </div>
    <div id="admin_level2">
        <ul class="menu">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Pages</a></li>
            <li><a href="themes.php">Themes</a></li>
            <li><a href="settings.php">Settings</a></li>
        </ul>
        
    </div>