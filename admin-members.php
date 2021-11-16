<?php
//include config
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);

if (!$user->is_logged_in()) {
    header('Location: admin-login.php');
    exit();
}
// print_r($_SESSION);
// print_r($_COOKIE);

$title = 'PHP Registration and Login Demo :-Home';

//include header template

$row = $user->get_user_details_from_id($_SESSION['id']);

require_once('header.php');

?>

<main>
    <div id="main">
      Members page

</main>


<?php
//include header template
require('footer.php');
