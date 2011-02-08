<form class="adminform" action="add_page.php" method="get" accept-charset="utf-8">
    <h3>Add a new Page</h3>
    <label for="page_name">Page Name</label><input type="text" name="page_name" value="" id="page_name"><br/> <!--TODO Remove BR tag here and style with CSS-->
    <label for="maxitems">Max Items</label><input type="text" name="maxitems" value="" id="maxitems"><br/>
    <label for="enabled">Enabled</label><input type="checkbox" name="enabled" value="1" id="enabled" checked="checked">
    
    <p><input type="submit" name="submit" value="Add Page"></p>
</form>