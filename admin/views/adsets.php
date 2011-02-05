<?php
if ($adsets != null)
    foreach ($adsets as $adset)
    {
        echo '<div class="aadset">';
        echo $adset->id;
        echo "\t" . $adset->name;
        echo "\t" . $adset->pageid;
        echo '</div>';
    }
?>