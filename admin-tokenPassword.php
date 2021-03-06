<?php 
/*
Temp login for changing password
*/
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);

if ($user->is_logged_in()) {
    header('Location: admin-members.php');
    exit();
}

if (isset($_GET['resetToken']) && strlen($_GET['resetToken']) ) {

    $stmt = $db->prepare('
    SELECT 
    *
    FROM users WHERE 
    resetToken = :resetToken 
    AND active=1 
    ');
    $stmt->execute(array('resetToken' => $_GET['resetToken']));

    if ($row_count = $stmt->rowCount()) {
        $row = $stmt->fetch();

        $sql = "UPDATE users 
        SET 
        last_log=?,  
        resetToken=?
        WHERE id=?";
        $stmt = $db->prepare($sql);
        $date = date('Y/m/d H:i:s');
        $stmt->execute([$date, "", $row['id']]);


        $user->setSessions($row);
    } else {
        $stop = "Unable to find your details ";
    }
} else {
    exit();
}



//define page title
$title = 'Reset Account';

//include header template
require_once('header.php');
?>



<div class="row">
        <?php if (isset($stop)) {
        ?>
            <div class="row">
                <div class="col-12 text-center bg-info">
                    Unable to find your details
                    <a  href="admin-login.php">Home</a>
                   
                </div>
            </div>
        <?php

         
        } else { ?>

            <div class="row">
                <div class="col-12 text-center fs-3 p3 m-4">
                    Please choose a
                    <a href="admin-changePassword.php">new password</a>
                     to continue using the site
                </div>
            </div>

        <?php } ?>
  
</div>


</div>

<?php
//include header template
require('footer.php');
?>