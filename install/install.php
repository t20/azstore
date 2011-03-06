<?php

    // All set , create the tables
    require_once('schema.php');
    include '../settings/config.php';
    include '../includes/database.php';
    
    $results = array();
    foreach ($azstore_db_create_query as $query) {
        $results[] = db_query($query);
    }
    
    // foreach ($results as $result) {
    //         echo 'Result : ' . $result;
    //     }

?>