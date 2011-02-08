<?php

// Bharadwaj
// 28 September 2010


// Input : Search keyword
// Output : An array of products
function get_products_by_keyword ($keyword)
{
    include 'cloudfusion/cloudfusion.class.php';
    $pas = new AmazonPAS();
    
    $options = array('ResponseGroup' => 'Large');
    $items = $pas->item_search($keyword, $options);

    $products = array();
    #todo -> check for error here
    foreach ($items->body->Items->Item as $item)
    {
        $product['asin'] = $item->ASIN;
        $product['url'] = $item->DetailPageURL;
        $product['title'] = $item->ItemAttributes->Title;
        $product['image'] = $item->MediumImage->URL;
        $product['price'] = $item->OfferSummary->LowestNewPrice->FormattedPrice;
        $product['rating'] = $item->CustomerReviews->AverageRating;
        $product['num_ratings'] = $item->CustomerReviews->TotalReviews;
        $products[] = $product;
    }
    return $products;
}

//Input : Adset
// Output : products from adset
function duplicate_adset ($adset)
{
    
    
}

function get_product_details($asin)
{
    require_once 'cloudfusion/cloudfusion.class.php';

    $product = new product();

    $pas = new AmazonPAS();
    $options = array('IdType'=>'ASIN', 'ResponseGroup' => 'Large');
    $item = $pas->item_lookup($asin, $options);
    foreach ($item->body->Items->Item as $item)   
    {
        $product->asin = $item->ASIN;
        $product->url = $item->DetailPageURL;
        $product->title = $item->ItemAttributes->Title;
        $product->image = $item->MediumImage->URL;
        $product->price = $item->OfferSummary->LowestNewPrice->FormattedPrice;
        $product->rating = $item->CustomerReviews->AverageRating;
        $product->num_ratings = $item->CustomerReviews->TotalReviews;
    }   
    return $product;
}

function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	$data = mysql_real_escape_string($data);
	return $data;
}

function get_pages()
{
    require_once 'database.php';
    $pages_select_query = db_query("SELECT * FROM pages");
    $pages = null;
    while($page = db_fetch_array($pages_select_query)) 
    {
    	//Return each page title seperated by a newline.
        $apage = new Page();	
        $apage->id = $page['id'];
        $apage->name = $page['name'];
        $apage->maxitems = $page['maxitems'];
        $pages[] = $apage;
    }
    return $pages;
}

function get_settings()
{
    require_once 'database.php';
    $select_settings_query = "select setting,value from settings where setting in ('sitename', 'tagline','username')";
    $result = db_query($select_settings_query);
    $settings = array();
    while($row = mysql_fetch_assoc($result))
    {
        $setting = $row['setting'];
        $settings[$setting] = $row['value'];
    }
    return $settings;
}

?>