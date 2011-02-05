<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div id="wrapper">
    <?php
        include '../includes/functions.php';
        include '../settings/config.php';
        include '../includes/database.php';
        
        $message = array();
        foreach($_GET as $key => $value) 
        {
        	$data[$key] = filter($value); //get variables are filtered.
        }
        
        if ($data['submit']=='Add Page')
        {
	        $page_name = $data['page_name'];
	        $maxitems = $data['maxitems'];
	        $enabled = $data['enabled'];	        
	        $add_page_query = "insert into pages (`name`,`maxitems`,`enabled`) values('$page_name', '$maxitems','$enabled')";
        	$result = mysql_query($add_page_query) or die (mysql_error());
        	if ($result == 1)
        	$message[] = "Page <i>$page_name</i> added";
        }
        
    ?>
    <div id="message">
        <?php
            foreach ($message as $m) 
            {
		    	echo "$m <br>";
		    }
        ?>
    </div>
    <div class="admin_content" id="add_page">
        <form action="add_page.php" method="get" accept-charset="utf-8">
            <label for="page_name">Page Name</label><input type="text" name="page_name" value="" id="page_name"><br/> <!--TODO Remove BR tag here and style with CSS-->
            <label for="maxitems">Max Items</label><input type="text" name="maxitems" value="" id="maxitems"><br/>
            <label for="enabled">Enabled</label><input type="checkbox" name="enabled" value="1" id="enabled" checked="checked">
            
            <p><input type="submit" name="submit" value="Add Page"></p>
        </form>
    </div>
</div><!--End wrapper-->
</body>
</html>
            