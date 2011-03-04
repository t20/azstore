<?php
// 5 November 2010
// Bharadwaj

include '../environment.php';

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
    $username = $data['user_name'];
    $password = $data['password'];
    $password = sha1($password);
    $login_select_query = "select * from users where user_name ='$username' AND pwd='$password'";
    $result = db_query($login_select_query) or die("Insertion Failed2:" . mysql_error());
    $login_query_result_count = mysql_num_rows($result);
    if ($login_query_result_count <= 0)
        $message [] = 'Invalid Login credentials';
    else
    {
        while($row = mysql_fetch_assoc($result))
            $userid = $row['id'];

        session_start();
 	    session_regenerate_id (true);

 		$_SESSION['user_id']= $userid;  
 		$_SESSION['user_name'] = $username;
 		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

 		//update the timestamp and key for cookie
 		$stamp = time();
 		$ckey = sha1(rand(1000,getrandmax()));
 		db_query("update users set `ctime`='$stamp', `ckey` = '$ckey' where id='$userid'") or die(mysql_error());

 		//set a cookie
        if(isset($_POST['remember_me']))
        {
 		    setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*2, "/");
 			setcookie("user_key", sha1($ckey), time()+60*60*24*2, "/");
 			setcookie("user_name",$_SESSION['user_name'], time()+60*60*24*2, "/");
 		}
        header("Location: index.php");
    }

}

?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php include 'views/message.php'; ?>
<form action="login.php" method="post" accept-charset="utf-8">
    <label for="user_name">User Name</label><input type="text" name="user_name" value="" id="user_name">
    <label for="password">Password</label><input type="password" name="password" value="" id="password">
    <label for="remember_me">Remember Me</label><input type="checkbox" name="remember_me" value="" id="remember_me">
    <p><input type="submit" name="login" id="login" value="Login"></p>
</form>
</body>
</html>