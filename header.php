<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <div id="wrapper">
    
<?php

include 'settings/config.php';
include 'includes/database.php';
include 'includes/functions.php';
include 'includes/models/models.php';

//display menu
$pages = get_pages();
include 'views/menu.php';

//Get Settings - sitename, tagline become keys in the settings associative array
$settings = get_settings();

?>

<div id="sitename"><?php echo $settings['sitename']; ?></div>
<div id="tagline"><?php echo $settings['tagline']; ?></div>