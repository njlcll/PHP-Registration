<?php require('includes/config.php');

echo ("$_SERVER[REQUEST_URI]");
echo $_SERVER['HTTP_USER_AGENT'];
$agent = $_SERVER["HTTP_USER_AGENT"];

if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
  echo "You're using Internet Explorer";
} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
  echo "You're using Chrome";
} else if (preg_match('/Edge\/\d+/', $agent) ) {
  echo "You're using Edge";
} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
  echo "You're using Firefox";
} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
  echo "You're using Opera";
} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
  echo "You're using Safari";
}
echo $_SERVER['REMOTE_ADDR'];

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