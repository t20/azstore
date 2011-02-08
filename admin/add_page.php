<?php  include 'admin_header.php'; ?>
<?php
        
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
    <?php include 'views/message.php'; ?>
    <div class="admin_content" id="add_page">
        <?php include 'views/add_page.php'; ?>
    </div>
<?php  include 'admin_footer.php';?>
            