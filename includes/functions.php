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

// get_product_details
// Calls amazon cloudfusion to get product details
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
    while($row = db_fetch_array($result))
    {
        $setting = $row['setting'];
        $settings[$setting] = $row['value'];
    }
    return $settings;
}

function get_products($page_id, $limit=10)
{
    $select_asins_query = "select * from associations where pageid = '$page_id' limit $limit";
    $asins_query_result = db_query($select_asins_query) or die("Query Failed:" . mysql_error());
    $products = array();
    while($tmp_asin = db_fetch_array($asins_query_result)) 
    {
        $asin = $tmp_asin['asin'];
        $product = get_product_details($asin);
        $products[] = $product;
    }
    return $products;
}

function get_theme()
{
    $select_theme_query = "select value from settings where setting = 'theme'";
    $result = db_query($select_theme_query);
    while($row = mysql_fetch_assoc($result))
    {
        $theme = $row['value'];
    }
    return $theme;
}

// Code credits:
// PHP login script
// The login functionality has been modeled after sections of this code.
function is_logged_in()
{
    session_start();

    if (isset($_SESSION['HTTP_USER_AGENT']))
    {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
        {
            logout();
            exit;
        }
    }

    if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) ) 
    {
    	if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_key']))
    	{
        	$cookie_user_id  = filter($_COOKIE['user_id']);
        	$rs_ctime = mysql_query("select `ckey`,`ctime` from `users` where `id` ='$cookie_user_id'") or die(mysql_error());
        	list($ckey,$ctime) = mysql_fetch_row($rs_ctime);
        	// coookie expiry
        	if( (time() - $ctime) > 60*60*24*2) 
        	{
        		logout();
        	}
    	
        	if( !empty($ckey) && is_numeric($_COOKIE['user_id']) && isUserID($_COOKIE['user_name']) && $_COOKIE['user_key'] == sha1($ckey))
        	{
        	    session_regenerate_id(); //against session fixation attacks.
                $_SESSION['user_id'] = $_COOKIE['user_id'];
                $_SESSION['user_name'] = $_COOKIE['user_name'];
                $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
        	}
        	else
        	{
        	    header("Location: login.php");
        	    exit;
        	    logout();
        	}
        }
        else   
        {
        	header("Location: login.php");
        	exit;
        }
    }
}

function logout()
{
    if(isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) 
    {
        mysql_query("update `users` 
    			set `ckey`= '', `ctime`= '' 
    			where `id`='$_SESSION[user_id]' OR  `id` = '$_COOKIE[user_id]'") or die(mysql_error());
    }			

    /************ Delete the sessions****************/
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();

    /* Delete the cookies*******************/
    setcookie("user_id", '', time()-60*60*24*2, "/");
    setcookie("user_name", '', time()-60*60*24*2, "/");
    setcookie("user_key", '', time()-60*60*24*2, "/");

    header("Location: login.php");
}

function isUserID($username)
{
	if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
		return true;
	} else {
		return false;
	}
}
?>