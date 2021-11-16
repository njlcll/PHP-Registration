<?php 
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);



$testAccess = 1;
if (!$user->hasAccess($testAccess)) {
    echo "you dont have access to this page your access is $_SESSION[priv]<br> Page level is $testAccess";
    exit();
}

//define page title
$title = 'Change Password';

//include header template
require_once('header.php');


?>
<div class="row bg-white">
    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center">


        </div>
    </div>
</div>



<?php
//include header template
require('footer.php');
?>