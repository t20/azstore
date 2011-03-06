<div id="message_wrapper">
    <?php
        if ($message)
        {
            echo '<div id="message">';
                foreach ($message as $m) 
                {
        	    	echo "$m <br>";
        	    }
            echo '</div>';
        }
    ?>
</div>
