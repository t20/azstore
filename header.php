<?php

include 'settings/config.php';
include 'includes/database.php';
include 'includes/functions.php';
include 'includes/models/models.php';

//display menu
$pages = get_pages();

//Get Settings - sitename, tagline become keys in the settings associative array
$settings = get_settings();

$theme = get_theme();

?>

<html>
<head>
    <title><?php echo $settings['sitename']; ?></title>
    <link rel="stylesheet" href="<?php echo "themes/$theme/" ?>style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <div id="wrapper">

<div id="sitename"><?php echo $settings['sitename']; ?></div>
<div id="tagline"><?php echo $settings['tagline']; ?></div>
<div class="clear"></div>

<?php include 'views/menu.php'; ?>