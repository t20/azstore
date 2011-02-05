<?php

// Author : Bharadwaj
// Date : 16 Sep 2010

// get the asin IDs and store them in the database

echo '<hr/>';

$pageid =  $_POST['pid'];

echo 'The following ASINs were added to page ID :' . $pageid;

include '../settings/config.php';
require_once '../includes/database.php';

for ($i=0; $i<count($_POST['asin']);$i++)
{
    $asin = $_POST['asin'][$i];
    echo "<br />value $i = ". $asin . "<br/>";
    
    $asin_insert = "INSERT into asins (`asin`)  VALUES ( '". $asin ."' )";
    db_query($asin_insert) or die("Insertion Failed:" . mysql_error());

	$association_insert = "INSERT into associations (`asin`, `pageid`)  VALUES ( '". $asin ."' , '". $pageid ."' )";
    db_query($association_insert) or die("Insertion Failed:" . mysql_error());
}

// add asins to pid

//redirect to a single page

?>