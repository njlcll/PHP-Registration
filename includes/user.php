<?php

class User
{
	private $_db;

	function __construct($db)
	{
		$this->_db = $db;
	}

	public  function get_user_details_from_email($email)
	{
		try {
			$stmt = $this->_db->prepare('
			SELECT 
			*
			FROM users WHERE 
			email = :email AND active=1 ');
			$stmt->execute(array('email' => $email));

			return $stmt->fetch();
		} catch (PDOException $e) {
			echo '<p class="bg-danger"> get_user_details_from_email' . $e->getMessage() . '</p>';
		}
	}

	public  function get_user_details_from_id($id)
	{
		try {
			$stmt = $this->_db->prepare('
			SELECT 
			*
			FROM users WHERE 
			id = :id AND active=1 ');
			$stmt->execute(array('id' => $id));

			return $stmt->fetch();
		} catch (PDOException $e) {
			echo '<p class="bg-danger"> get_user_details_from_id' . $e->getMessage() . '</p>';
		}
	}

	// public function isValidUsername($username)
	// {
	// 	if (strlen($username) < 3) {
	// 		return false;
	// 	}

	// 	if (strlen($username) > 17) {
	// 		return false;
	// 	}

	// 	if (!ctype_alnum($username)) {
	// 		return false;
	// 	}

	// 	return true;
	// }

	public function check_password($post, &$error)
	{

		//basic validation
		if (strlen($post['password']) < MIN_PASSWORD_LENGTH) {
			$error[] = 'Password is too short.';
		}

		if (strlen($post['passwordConfirm']) < MIN_PASSWORD_LENGTH) {
			$error[] = 'Confirm password is too short.';
		}

		if ($post['password'] != $post['passwordConfirm']) {
			$error[] = 'Passwords do not match.';
		}
	}


	public function setSessions($row)
	{
		$_SESSION['priv'] = $row['priv'];
		$_SESSION['id'] = $row['id'];
	}

	public function login($email, $password)
	{

		$row = $this->get_user_details_from_email($email);

		$row['password'] = $row['password'] ?? "";
		if (password_verify($password, $row['password'])) {
			$this->setSessions($row);

			$sql = "UPDATE users 
			SET 
			last_log=?,  
			resetToken=?
			WHERE id=?";
			$stmt = $this->_db->prepare($sql);
			$date = date('Y/m/d H:i:s');
			$stmt->execute([$date, "", $row['id']]);
		
		
			// if they've just logied in might need to change there user id
			// in the visitor table from -1
			if( isset($_COOKIE[COOKIE_STATS]) & function_exists('createStats')){
				
				$sql = "UPDATE visitors 
				SET 
				user=?
				WHERE tracker=? LIMIT 1";
				
				$stmt = $this->_db->prepare($sql);
				$stmt->execute(array($row['id'] , $_COOKIE[COOKIE_STATS]));
			}
			return $row['id'];
		}
		return false;
	}

	public function logout()
	{
		session_destroy();
		setcookie(COOKIE_NAME, "", time() - (60 * 60 * 24));
	}

	public function is_logged_in()
	{
		if (isset($_SESSION['id']) &&  $_SESSION['id']) {
			return $_SESSION['id'];
		}

		if (!empty($_COOKIE[COOKIE_NAME])) {

			$stmt = $this->_db->prepare('
			SELECT 
			*
			FROM users WHERE 
			cookie = :cookie AND active=1 ');
			$stmt->execute(array('cookie' => $_COOKIE[COOKIE_NAME]));

			if ($row_count = $stmt->rowCount()) {

				$row = $stmt->fetch();
				$this->setSessions($row);

				$sql = "UPDATE users 
					SET 
					last_log=?,  
					resetToken=?
					WHERE id=?";
				$stmt = $this->_db->prepare($sql);
				$date = date('Y/m/d H:i:s');
				$stmt->execute([$date, "", $row['id']]);
				return $row['id'];
			}
		}

		return false;
	}

	function hasAccess($access)
	{
		if (!$this->is_logged_in()) {
			return 0;
		}
		if (isset($_SESSION['priv']) &&  $_SESSION['priv']) {
			return $_SESSION['priv'] & $access;
			echo $_SESSION['priv'] | $access;
		} else {
			return 0;
		}
	}
}
