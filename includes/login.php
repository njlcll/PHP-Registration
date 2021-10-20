<?php
//process login form if submitted
if (isset($_POST['submit'])) {

	if (!isset($_POST['username'])) {
		$error[] = "Please fill out all fields";
	}

	if (!isset($_POST['password'])) {
		$error[] = "Please fill out all fields";
	}

	$username = $_POST['username'];
	if ($user->isValidUsername($username)) {
		if (!isset($_POST['password'])) {
			$error[] = 'A password must be entered';
		}

		$password = $_POST['password'];

		if ($user->login($username, $password)) {
			$_SESSION['username'] = $username;

			if ($_POST['remember']) {
				$selector = base64_encode(random_bytes(9));
				$authenticator = random_bytes(33);

				setcookie(
					'remember',
					$selector . ':' . base64_encode($authenticator),
					time() + 864000,
					'/',
					$_SERVER['HTTP_HOST'],
					false, // TLS-only
					false  // http-only
				);

				$sql = 'INSERT INTO auth_tokens 
				(selector, token, memberid, expires) 
				VALUES 
				(
				:selector,
				:token, 
				:memberid, 
				:expires)';

				
				$params = array(
					'selector' => $selector,
					'token' => hash('sha256', $authenticator),
					'memberid' => $_SESSION['memberID'],
					'expires' => date('Y-m-d\TH:i:s', time() + 864000)
				);
				
				$stmt = $db->prepare($sql);				
				$stmt->execute(
					$params
				);
			}

			header('Location: memberpage.php');
			exit;
		} else {
			$error[] = 'Wrong username or password or your account has not been activated.';
		}
	} else {
		$error[] = "Usernames are required to be Alphanumeric, and between  3-16 characters long";
	}
}//end if submit