<?php
if ($pages != null)
    foreach ($pages as $page)
    {
        echo '<div class="menuitem">';
        echo "<a href='page.php?scrap=" . $page->id  . "'>" . $page->name . '</a>';
        echo '</div>';
    }
?>