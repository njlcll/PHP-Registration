<?php
require_once('config.php');
require_once('includes/user.php');
$user = new User($db);

//if logged in redirect to members page
if ($user->is_logged_in()) {
	header('Location: admin-members.php');
	exit();
}
if (isset($_POST['submit'])) {
	require_once("includes/inc-lostPassword.php");
}

//define page title
$title = 'Reset Account';

//include header template
require_once('header.php');

if (isset($_POST['submit'])) {
	if (!isset($error)) {

?>
		<div class="d-flex justify-content-center align-items-center">
			<div class="row form-holder">
				<div class="col-12 p-3">
					A link has been sent for you to login with a temporary password.
				</div>
			</div>
		</div>
<?php
		require_once('header.php');
		exit();
	}
}
?>



<div class="d-flex justify-content-center align-items-center">
	<div class="row form-holder">
		<div class="col-12">
			<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
				<h2>Reset Password</h2>
				<p><a href='admin-login.php'>Back to login page</a></p>
				<hr>

				<?php
				//check for any errors
				if (isset($error)) {
					foreach ($error as $e) {
						echo '<div class="alert alert-warning">' . $e . '</div>';
					}
				}


				?>

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Send Reset Link" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>

	</div>
</div>




<?php
//include header template
require('footer.php');
?>