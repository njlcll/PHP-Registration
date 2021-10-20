<?php

class User
{
	private $_db;

	function __construct($db)
	{
		$this->_db = $db;
	}

	private function get_user_details_from_email($email)
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
			echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
		}
	}

	public function isValidUsername($username)
	{
		if (strlen($username) < 3) {
			return false;
		}

		if (strlen($username) > 17) {
			return false;
		}

		if (!ctype_alnum($username)) {
			return false;
		}

		return true;
	}

	public   function check_password($post, &$error)
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
			return true;
		}
	}

	public function logout()
	{
		session_destroy();
	}

	public function is_logged_in()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			return true;
		}
	}
}
