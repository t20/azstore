<?php include 'admin_header.php'; ?>
    <div id="message">       
    </div>
    <div class="admin_content" id="pages">
    <div id="steps">
        <h3>Basic Steps</h3>
        <p>1. Add page</p>
        <p>2. Add products to a page</p>
    </div>
        <?php
            // to do 
            // I have looked at multiple PHP ORM libraries that will help simplify this process.
            // The cloest ones that look promising are redbeanphp, pork db and idiorm.
            // AS of now, I continue working on this project without a ORM layer.
            
            echo "<h3 id='pages_title'>My Pages</h3>";
            echo "<h4 id='pages_add'><a href='add_page.php'>Add a Page</a></h4>";

            $pages = get_pages();
            include 'views/pages.php';
        ?>
    </div>
<?php  include 'admin_footer.php'; ?>