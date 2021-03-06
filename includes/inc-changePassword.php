<?php

//if form has been submitted process it
if(isset($_POST['submit'])){

    if( !$user->is_logged_in() ){ header('Location: index.php'); exit(); }   

    $user->check_password($_POST, $error);

    
	if (!isset($error)){

		//hash the password
		$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);		
		try {

            $stmt = $db->prepare("
			UPDATE users SET 
			password = :hashedpassword,
			resetToken = :resetToken
              WHERE id = :id");
				$stmt->execute(array(
                    ':hashedpassword' => $hashedpassword,
                    ':resetToken' => "",
                    ':id' => $_SESSION['id']
                ));
                header('Location: admin-members.php');
		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
	}
}
?>