<?php
$con = mysqli_connect('localhost', 'root', '', 'chatbox');

if (isset($_POST['submit'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	if ($pass == $cpass) {
		$res = $con->query("INSERT INTO users (username,password) VALUES ('$user', '$pass')");
		header("Location: index.php");
	}
}

?>