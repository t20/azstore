<form action="settings.php" method="post" accept-charset="utf-8">
    <label for="sitename">Site Name</label><input type="text" name="sitename" value="<?php echo $sitename; ?>" id="sitename">
    <label for="tagline">Tag Line</label><input type="text" name="tagline" value="<?php echo $tagline; ?>" id="tagline">
    <label for="username">User name</label><input type="text" name="username" value="<?php echo $username; ?>" id="username">
   <label for="password">Password</label><input type="password" name="password" value="" id="password">
    <p><input type="submit" name="Submit" id="Submit" value="Update"></p>
</form>