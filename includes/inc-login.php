<?php
//process login form if submitted
if (isset($_POST['submit'])) {

	if (!isset($_POST['email'])) {
		$error[] = "Please fill out all fields";
	}

	if (!isset($_POST['password'])) {
		$error[] = "Please fill out all fields";
	}

	$email = $_POST['email'] ?? "";;
	$password = $_POST['password'] ?? "";;

	if ($userId = $user->login($email, $password)) {
	
		if ($_POST['remember']) {

			$cookieValue = md5($email . COOKIE_SALT);
			setcookie(
				COOKIE_NAME,
				$cookieValue,
				time() + (60*60*24*365),
			);

			$sql = "UPDATE users SET cookie=? WHERE id=? LIMIT 1";
			$stmt = $db->prepare($sql);
			$stmt->execute([$cookieValue, $userId]);
		}

		header('Location: members.php');
		exit;
	} else {
		$error[] = 'Wrong email or password or your account is deactivated.';
	}
}
