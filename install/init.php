<?php

include '../environment.php';

$message = array();

foreach($_POST as $key => $value) 
{
	$data[$key] = filter($value); //post variables are filtered.
}

$username = $data['user_name'];
$password = sha1($data['password']);
$user_email = $data['user_email'];

if ($data['Submit'] == 'Submit')
{
    //Create user
    //Lead to login screen
    $user_insert_query = "INSERT INTO `USERS` (`user_name`, `user_email`, `pwd`) values ('$username' , '$user_email', '$password');";
    db_query($user_insert_query) or die("Insertion Failed:" . mysql_error());
    header("Location: ../admin/index.php");
}
?>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Init Azstore</title>
        <link rel="stylesheet" href="../admin/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <form action="" method="POST" accept-charset="utf-8">
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" value="" id="user_name">
            <label for="password">Password</label>
            <input type="password" name="password" value="" id="password">
            <label for="user_email">User Email</label>
            <input type="text" name="user_email" value="" id="user_email">
            <p><input type="submit" name="Submit" value="Submit"></p>
        </form>
    </body>
</html>