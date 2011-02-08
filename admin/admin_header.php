<?php
    include '../settings/config.php';
    include '../includes/database.php';
    include '../includes/models/models.php';
    include '../includes/functions.php';
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
            <div id="sitename">Admin Section - <?php echo $settings['sitename']; ?> </div>
        </div>
        <div id="admin_logout"><a href = "/logout.php">Logout</a></div>
        <div class="clear"></div>
    </div>