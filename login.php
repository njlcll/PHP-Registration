<?php
require('includes/config.php');

//check if already logged in move to home page
if ($user->is_logged_in()) {
	header('Location: members.php');
	exit();
}

if (isset($_POST['submit'])) {
	require_once("includes/inc-login.php");
}

//define page title
$title = 'Login';

//include header template
require_once('header.php');
?>

<div class="d-flex justify-content-center align-items-center">
	<div class="row form-holder">

		<div class=" col-sm-12 ">
			<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
				<h2>Please Login</h2>
				<p>Not a member? <a href='registration.php'>Register</a></p>
				<hr>

				<?php
				//check for any errors

				if (isset($error)) {
					foreach ($error as $error) {
						echo '<p class="bg-info">' . $error . '</p>';
					}
				}

				// if (isset($_GET['action'])) {

				// 	//check the action
				// 	switch ($_GET['action']) {
				// 		case 'active':
				// 			echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
				// 			break;
				// 		case 'reset':
				// 			echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
				// 			break;
				// 		case 'resetAccount':
				// 			echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
				// 			break;
				// 	}
				// }


				?>

				<div class="form-group p-2">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" <?php if (isset($error)) {
																														echo  "value='" . htmlspecialchars($_POST['email'] ?? "", ENT_QUOTES) . "'";
																													}
																													?> tabindex="1">
				</div>

				<div class="form-group p-2">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="2">
				</div>
				<div class="form-group p-2">

					<label for="remember" class=''> Remember Me</label>
					<input type="checkbox" name="remember" id="remember" class="form-check-input" tabindex="3">

				</div>

				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9 p-2">
						<a href='lostPassword.php'>Forgot your Password?</a>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>
</div>



</div>


<?php

require('footer.php');
?>