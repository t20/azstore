<?php
if ($pages != null)
    foreach ($pages as $page)
    {
        echo '<div class="apage">';
        echo '<div class="page_id">' . $page->id . '</div>';
        echo '<div class="page_name">' . $page->name . '</div>';
        echo '<div class="page_action"><a href="../products/' . $page->id . '">View</a></div>';
        echo '<div class="page_action"><a href="page.php?pid=' . $page->id . '">Edit</a></div>';
        echo '<div class="page_action"><a href="edit_products.php?pid=' . $page->id . '">Edit Products</a></div>';
        echo '<div class="page_action"><a href = "add_products.php?pid=' . $page->id . '">Add Products</a></div>';
        echo '<div class="clear"></div>';
        echo '</div>';
    }
    echo '<div class="clear"></div>';    
?>