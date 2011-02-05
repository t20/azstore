<?php
// 5 November 2010
// Bharadwaj

$message = array();
foreach($_GET as $key => $value) 
{
	$data[$key] = filter($value); //get variables are filtered.
}
foreach($_POST as $key => $value) 
{
	$data[$key] = filter($value); //post variables are filtered.
}

if ($data['login'] == 'Login')
{
    $username = $data['username'];
    $password = $data['password'];
    $password = sha1($password);
    $login_select_query = "select * from users where username ='$username' AND password='$password'";
    $login_query_result_count = db_num_rows($login_select_query) or die("Insertion Failed:" . mysql_error());
    if ($login_query_result_count)
        header("Location: index.php");
}

?>

<form action="login.php" method="post" accept-charset="utf-8">
    <label for="user_name">User Name</label><input type="text/submit/hidden/button" name="user_name" value="" id="user_name">
    <label for="password">Password</label><input type="password" name="password" value="" id="password">
    <label for="remember_me">Remember Me</label><input type="checkbox" name="remember_me" value="" id="remember_me">
    <p><input type="submit" name="login" id="login" value="Login"></p>
</form>