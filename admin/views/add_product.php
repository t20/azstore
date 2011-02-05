<form action="add_products.php" method="get" accept-charset="utf-8">
    <div id="products_list">
        <input type="hidden" name="add_type" value="1" id="some_name">    
        <label for="keyword">Keyword </label><input type="text" name="keyword" value="" id="keyword">
    </div>
    <?php
        if (isset($_GET['pid']))
            echo '<input type="hidden" name="pid" value="'. $_GET['pid'] .'" id="pid">';
    ?>
    <p><input type="submit" value="Show products"></p>
</form>