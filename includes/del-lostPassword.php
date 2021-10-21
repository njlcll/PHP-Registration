<?php
require_once("classes/user.php");
//if logged in redirect to members page
if ($user->is_logged_in() ){ 
	header('Location: memberpage.php'); 
	exit(); 
}

$error = false;
$resetToken = $_GET['key']??"";

$row = $user->checkResetToken($resetToken);

//if no token from db then kill the page
if (empty($row['resetToken'])){
	$error = 'Invalid token provided, please use the link provided in the reset email.';
} elseif($row['resetComplete'] == 1) {
	$error = 'Your password has already been changed!';
}

//if form has been submitted process it
if (isset($_POST['submit']) && ! is_array($error)){

	if (! isset($_POST['password']) || ! isset($_POST['passwordConfirm'])) {
		$error[] = 'Both Password fields are required to be entered';
	}


	//if no errors have been created carry on
	if ($user->isValidPassword($_POST['password'], $error)){
		
		$user->changePassword($_POST['password'], );
		//redirect to index page
		header('Location: login.php?action=resetAccount');
		exit;

	}
}
?>