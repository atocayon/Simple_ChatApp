<!-- LOGIN ACTION -->
<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'chatbox');

if (isset($_POST['submit'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$result = $con->query("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
	$row = $result->fetch_assoc();
	$_SESSION['username'] = $row['username'];
	header("Location: index.php");
}

?>