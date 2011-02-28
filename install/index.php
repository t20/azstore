<?php

// 10 November 2010
// Author : Bharadwaj

require_once ('../includes/functions.php');

define('SETTINGS_FILE', '../settings/config.php');
define('SETTINGS_TEMPLATE', 'settings.tpl');

foreach($_POST as $key => $value) 
{
	$data[$key] = filter($value); //post variables are filtered.
}

$connected = false;
$writable = false;
$modchanged = false;
$error = array();
$message = array();

if (isset($data['submit']))
{
    //Try connecting to the DB
    try {
        $host = $data['host'];
        $username = $data['database_username'];
        $password = $data['database_password'];
        $database = $data['database'];
        $db_link = @mysql_connect($host, $username, $password);
        if (!$db_link) 
        {
            $connected = false;
            $error [] = 'Cannot connect to the database, Please check your host, username/password';
        }else
        {
            $selected = @mysql_select_db($database, $db_link);
            if (!$selected)
            {
                $error[] = 'Connected to MySql, but cannot find the database';
            }else
            {
                $connected = true;
                $message [] = 'Connected to the Database.';
            }
            //close db connection
            @mysql_close($db_link);
        }
        
    } catch (Exception $e) {
        $connected = false;
    }
    
    if (file_exists(SETTINGS_FILE))
    {
       if (is_writable(SETTINGS_FILE))
        {
            $writable = true;
        }else
        {
            $writable = false;
            $error[] = 'File not writable : /settings/config.php';
        }
    }else
    {
        $error[] = 'Config file /settings/config.php does not exist. Please create the file and copy the contents from below.';
        $writable = false;
    }

    if ($connected == true)
    {
        // Connected to the DB. Create template File
        include 'template.php';
        $template = new template(SETTINGS_TEMPLATE);
        $template->assign_tokens($data);
        $generated_template = $template->load_fetch();
        //TODO : Fix this in later version
        $generated_template = "<?php " . $generated_template . "?>" ;
        print_r($generated_template);
        // write the template file to disk
        if($writable)
        {
            $ret = file_put_contents(SETTINGS_FILE, $generated_template);
            if ($ret === false)
            {
                $error[] = 'Could not write to file';
            }else
            {
                $settings_stored = true;
                $message[] = 'Settings saved to the config file.';
                $modchanged = @chmod(SETTINGS_FILE, 0444);
                if ($modchanged)
                {
                    $message[] = 'Config File permissions changed to read only';
                }else
                {
                    $error[] = 'Please change File permissions of settings/config.php to readonly (444)';
                }
            }
        }
    }
}
?>
<p>Installation</p>

<?php
include '../includes/message.php';
?>

<?php 
    if(!$connected)
    include 'dbform.php';
    
    if($connected && !$writable) 
    {
        echo '<textarea cols="80" rows="20" id="congif_file_content">' . $generated_template . "</textarea>";
    }
?>

<p>Continue Installation</p>