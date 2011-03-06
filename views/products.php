<?php
echo "<div id='products'>";
foreach ($products as $product)
    {
       echo '<div class="aproduct">';
       echo '<a href = "' . $product->url . '"><img src = "' . $product->image . '"></a>';         
       echo '<a href = "' . $product->url . '"><p class="product_title">' . $product->title . '</p></a>';
       echo '<div class="clear"></div>';
       echo '</div>';
    }
echo "</div>";    
?>