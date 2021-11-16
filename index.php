<?php
//include config
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);


$title = 'PHP Registration and Login Demo :-Home';

//include header template
require_once('header.php');

?>
<main>
<div id="main ">
</div>
</main>


<?php
//include header template
require('footer.php');
