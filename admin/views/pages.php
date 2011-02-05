<?php
if ($pages != null)
    foreach ($pages as $page)
    {
        echo '<div class="apage">';
        echo $page->id;
        echo "\t" . $page->name;
        echo "\t <a href = 'page.php?pid=". $page->id ."'>Edit</a>";
        echo "\t <a href = 'view_page.php?pid=". $page->id ."'>View</a>";
        echo "\t <a href = 'add_products.php?pid=". $page->id ."'>Add Products</a>";
        echo '</div>';
    }
?>