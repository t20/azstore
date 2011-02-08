<?php
if ($pages != null)
    echo '<ul class="menu" id="main_menu">';
    foreach ($pages as $page)
    {
        echo '<li class="menuitem">';
        echo "<a href='products/" . $page->id  . "'>" . $page->name . '</a>';
        echo '</li>';
    }
?>