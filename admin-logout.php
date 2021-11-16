<?php 
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);

//logout
$user->logout(); 

//logged in return to index page
header('Location: index.php');
exit;
?>
