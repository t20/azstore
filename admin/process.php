<?php

// Author : Bharadwaj
// Date : 16 Sep 2010

// get the asin IDs and store them in the database

$pageid =  $_POST['pid'];

include '../settings/config.php';
require_once '../includes/database.php';

for ($i=0; $i<count($_POST['asin']);$i++)
{
    $asin = $_POST['asin'][$i];
//    echo "<br />value $i = ". $asin . "<br/>";
    
    $asin_insert = "INSERT into asins (`asin`)  VALUES ( '". $asin ."' ) ON DUPLICATE KEY UPDATE `asin` = '$asin'";
    db_query($asin_insert) or die("Insertion Failed:" . mysql_error());

	$association_insert = "INSERT into associations (`asin`, `pageid`)  VALUES ( '". $asin ."' , '". $pageid ."' ) ON DUPLICATE KEY UPDATE `pageid` = $pageid";
    db_query($association_insert) or die("Insertion Failed:" . mysql_error());
}

//redirect to a single page
header("Location: pages.php");

?>