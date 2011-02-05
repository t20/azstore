<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo $style; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
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
?>