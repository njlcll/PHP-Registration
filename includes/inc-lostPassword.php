<?php
require_once(dirname(__FILE__) . "/phpmailer/mail.php");
//if form has been submitted process it
if (isset($_POST['submit'])) {

	//Make sure all POSTS are declared
	if (!isset($_POST['email'])) {
		$error[] = "Please fill out all fields";
	}


	//email validation
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM users WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($row['email'])) {
			$error[] = 'Email provided is not recognised.';
		}
	}

	//if no errors have been created carry on
	if (!isset($error)) {

		//create the activation code
		$token = md5(uniqid(rand(), true));

		try {

			$stmt = $db->prepare("UPDATE users 
			SET resetToken = :token
			 WHERE
			 email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			));

			//send email
			$to = $row['email'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: 
			<a href='" . SITENAME . "admin-tokenPassword.php?resetToken=$token'>" . SITENAME . "tokenPassword.php?resetToken=$token</a></p>";

			if (IS_LOCAL) {
				echo $body;
			} else {
				$mail = new Mail();
				$mail->setFrom(SITEEMAIL);
				$mail->addAddress($to);
				$mail->subject($subject);
				$mail->body($body);
				$mail->send(); 
			}
		} catch (PDOException $e) {
			$error[] = $e->getMessage();
		}
	}
}