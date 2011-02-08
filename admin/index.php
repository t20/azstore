<?php include 'admin_header.php'; ?>
<div class="admin_content" id="pages">
    <div id="steps">
        <h3>Basic Steps</h3>
        <p>1. Add page</p>
        <p>2. Add products to a page</p>
    </div>
    <div id="pages_wrapper">
        <h3 id='pages_title'>My Pages</h3>
        <h4 id='pages_add'><a href='add_page.php'>Add a Page</a></h4>
        <div id="pages_content">
        <?php
            $pages = get_pages();
            include 'views/pages.php';
        ?>
        </div>
    </div>
</div>
<?php  include 'admin_footer.php'; ?>