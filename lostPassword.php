<?php require('includes/config.php');

//if logged in redirect to members page
if ($user->is_logged_in()) {
	header('Location: members.php');
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
	if (isset($error)) {
		foreach ($error as $error) {
			echo '<p class="bg-info">' . $error . '</p>';
		}
	} else {
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
				<p><a href='login.php'>Back to login page</a></p>
				<hr>

				<?php
				//check for any errors
				if (isset($error)) {
					foreach ($error as $error) {
						echo '<p class="bg-info">' . $error . '</p>';
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