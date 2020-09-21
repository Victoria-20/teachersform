<?php

date_default_timezone_set('Africa/Kampala');


define('URL_PUBLIC_FOLDER', 'static');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));

define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER . "/");
//
define("UPLOAD_DIR", 'uploads/');

//connection configuration
$connectionHost = 'localhost';
$connectionUsername = 'root';
$connectionPassword = '';
$connectionName = 'questions';

//Connect and select the database
$connection = mysqli_connect($connectionHost, $connectionUsername, $connectionPassword, $connectionName);

if (!$connection) {
    die("Connection failed: " . $connection->connect_error);
}
?>


<?php

function query($sql)
{

    global $connection;

    $sql = mysqli_query($connection, $sql);

    return $sql;
}




function f_date($date){
   
    return  date_format(date_create($date), ' l jS F Y');
}

function clean($input)
{
    global $connection;
    $input = trim(htmlentities(strip_tags($input, ",")));
    if (get_magic_quotes_gpc()) {
        $input = stripslashes($input);
    }

    $input = mysqli_real_escape_string($connection, $input);

    $input = trim($input);
    return $input;
}



function money($amount){
    $amount =  str_replace(',', '',$amount);
    $amount =  floatval($amount);
    $amount = intval($amount, 10);
     return $amount;
 }



 
?>