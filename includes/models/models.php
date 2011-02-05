<?php
    //Models for database Objects
    //will be replaced with ORM in a later release
    
    // Bharadwaj
    // 7 Oct 2010
    
    class Page
    {
        var $id = null;
        var $name = null;
        var $maxitems = null;
        var $enabled = null;
    }
    
    class adset
    {
        var $id = null;
        var $name = null;
        var $pageid = null;
    }
    
    class Product
    {
        var $asin = null;
        var $url = null;
        var $title = null;
        var $image = null;
        var $price = null;
        var $rating = null;
        var $num_ratings = null;
    }

?>