<?php require('includes/config.php');

if (!$user->is_logged_in()) {
    header('Location: index.php');
    exit();
}
if (isset($_POST['submit'])) {
    require_once("includes/inc-changePassword.php");
}

//define page title
$title = 'Change Password';

//include header template
require_once('header.php');


?>

<div class="d-flex justify-content-center align-items-center">
    <div class="row form-holder">
        <div class="col-12">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<p class="bg-info">' . $error . '</p>';
                }
            }
            ?>
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
                <div class="form-group p-2">
                    <h2>Change Password </h2>
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
                </div>

                <div class="form-group p-2">
                    <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="2">
                </div>


                <hr>
                <div class="row">
                    <div class="col-xs-6 col-md-6 p-2"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
//include header template
require('footer.php');
?>