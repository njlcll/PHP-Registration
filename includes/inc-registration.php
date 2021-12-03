<?php

//if form has been submitted process it
if (isset($_POST['submit'])) {

	if (!($_POST['name'])) {
		$error[] = "Please fill out all fields";
	}
	if (!($_POST['surname'])) {
		$error[] = "Please fill out all fields";
	}

	

	$email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Please enter a valid email address';
	}
	
	$stmt = $db->prepare('SELECT email FROM users WHERE email = :email');
	$stmt->execute(array(':email' => $email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!empty($row['email'])) {
		$error[] = 'Email provided is already in use. Please Login';
	}


	$user->check_password($_POST, $error);


	if (!isset($error)) {

		//hash the password
		$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);


		try {
	
			$stmt = $db->prepare('INSERT INTO users 
			(name, surname, email,password, active, priv) 
				VALUES
			 (:name, :surname,  :email, :password, :active, :priv)');
			$stmt->execute(array(
				':name' => $_POST['name'],
				':surname' => $_POST['surname'],
				':email' => $_POST['email'],
				':password' => $hashedpassword,
				':active' => 1,
				':priv' => 1,
			));
			$user->login($_POST['email'],$_POST['password'] );

			// //send email
			// $to = $_POST['email'];
			// $subject = "Registration Confirmation";
			// $body = "<p>Thank you for registering at demo site.</p>
			// <p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			// <p>Regards Site Admin</p>";

			// $mail = new Mail();
			// $mail->setFrom(SITEEMAIL);
			// $mail->addAddress($to);
			// $mail->subject($subject);
			// $mail->body($body);
			// $mail->send();

			//redirect to index page


			//header('Location: index.php?action=joined');
			//exit;

			//else catch the exception and show the error.
		} catch (PDOException $e) {
			$error[] = $e->getMessage();
		}
	}
}
