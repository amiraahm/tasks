<?php
session_start();
include "db_conn.php";

if (
	isset($_POST['Username']) && isset($_POST['password'])
	&& isset($_POST['phone']) && isset($_POST['repassword'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$firstName = validate($_POST['firstName']);
	$lastName = validate($_POST['lastName']);
	$Username = validate($_POST['Username']);
	$phone = validate($_POST['phone']);
	$gender = validate($_POST['gender']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['repassword']);

	$user_data = 'username=' . $Username;



	if ($pass !== $re_pass) {
		header("Location: login-register.php?error=The confirmation password  does not match&$user_data");
		exit();
	} else {

		// hashing the password
		$pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$Username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: login-register.php?error=The username is taken try another&$user_data");
			exit();
		} else {
			$sql2 = "INSERT INTO users(firstName , lastName , user_name , password , phone , gender) VALUES('$firstName','$lastName' ,'$Username','$pass', '$phone','$gender')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: login-register.php?success=Your account has been created successfully");
				exit();
			} else {
				header("Location: login-register.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: login-register.php");
	exit();
}