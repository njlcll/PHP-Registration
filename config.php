<?php
//
session_start();

function isLocalhost($whitelist = ['127.0.0.1', '::1'])
{
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}



//set timezone
date_default_timezone_set('Europe/London');


define ('COOKIE_NAME', 'enfieldrem');
define ('COOKIE_STATS', 'enfieldstat');
define ('COOKIE_SALT', 'UaZMBqi7NA');
define ('MIN_PASSWORD_LENGTH', 6);

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


if (isLocalhost()) {

    define ('SITENAME', 'https://www.');
    define('DBHOST', '');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', '');
    define('IS_LOCAL', true);
    define('SITE_ROOT', '/enfield/');


} else {

    define ('SITENAME', 'https://www.');
    define('DBHOST', 'localhost');
    define('DBUSER', '');
    define('DBPASS', '0O6q;OULqQ');
    define('DBNAME', '');
    define('IS_LOCAL', false);
    define('SITE_ROOT', '/');
}

define('SITEEMAIL', 'admin@.co.uk');

try {

    //create PDO connection
    $db = new PDO("mysql:host=" . DBHOST . ";charset=utf8mb4;dbname=" . DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
 
} catch (PDOException $e) {
    //show error
    echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
    exit;
}


/**
 * Replaces any parameter placeholders in a query with the value of that
 * parameter. Useful for debugging. Assumes anonymous parameters from 
 * $params are are in the same order as specified in $query
 *
 * @param string $query The sql query with parameter placeholders
 * @param array $params The array of substitution parameters
 * @return string The interpolated query
 */
function interpolateQuery($query, $params) {
    $keys = array();

    # build a regular expression for each parameter
    foreach ($params as $key => $value) {
        if (is_string($key)) {
            $keys[] = '/:'.$key.'/';
        } else {
            $keys[] = '/[?]/';
        }
    }

    $query = preg_replace($keys, $params, $query, 1, $count);

    #trigger_error('replaced '.$count.' keys');

    return $query;
}
//include the user class, pass in the database connection
//include( ABSPATH.'includes/user.php');



