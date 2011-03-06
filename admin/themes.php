<?php  include 'admin_header.php'; ?>
<?php
//4 March 2011
// Bharadwaj

$message = array();

$themes = array();
if ($handle = opendir('../themes')) 
{
    while (false !== ($file = readdir($handle))) 
    {
        if ($file != "." && $file != "..")
            if (!is_file($file))
                $themes [] =  "$file";
    }
    closedir($handle);
}

if ($_POST['submit']) 
{
    $theme = filter($_POST['theme']);
    $message [] = 'Selected theme ' . $theme;
    $update_theme_query = "update settings set value = '$theme' where setting = 'theme'";
    db_query($update_theme_query) or die("Update Failed:" . mysql_error());
}

$selected = get_theme();

// Check for deleted themes
if (!in_array($selected, $themes))
$selected = 'Default';

?>

<?php include 'views/message.php'; ?>
<h3>Themes</h3>
<p>Selected Theme: <?php echo $selected; ?></p>
<form id="theme_form" method="POST" accept-charset="utf-8">
    <?php
        foreach ($themes as $theme)
        {
            $radio_select = '';
            if ($theme == $selected)
                $radio_select = "checked = 'checked'";
            echo "<input type='radio' name='theme' $radio_select value='$theme'/>";
            echo "<label for='$theme'>" . $theme . "</label>";
            echo "<div class='clear'></div>";
        }
    ?>
    <p><input type="submit" value="Select Theme" name="submit"></p>
    <div class='clear'></div>
</form>

<?php include 'admin_footer.php'; ?>