<?php require('config.php'); 

//if not logged in redirect to login page
if (! $user->is_logged_in()){
    header('Location: login.php'); 
    exit(); 
}
print_r($_SESSION);

//define page title
$title = 'Members Page';

//include header template
require_once('layout/header.php'); 
?>

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Member only page - Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
				
				<hr>

		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>