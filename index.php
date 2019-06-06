<?php
session_start();

// CONDITION IF NOT LOGIN
if (!isset($_SESSION['username'])) {
?>
<head>
<link rel="icon" href="icon.png" type="image/gif">
<title>Simple Chat App</title>
<meta charset="UTF-8">
<meta name="description" content="Free Chat Application">
<meta name="keywords" content="Chat,Application">
<meta name="author" content="Aljon C. Tocayon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		#login{animation:animatezoom 0.7s}@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}}
		#input_user{position:relative;animation:animateleft 0.7s}@keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
		#input_pass{position:relative;animation:animateright 0.7s}@keyframes animateright{from{right:-300px;opacity:0} to{right:0;opacity:1}}
		#logo{position:relative;animation:animatetop 0.7s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
	</style>
</head>
	<!-- LOGIN FORM -->
<body background="background.jpg">
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div style="height: 50px;"></div>
			<center>
				<img src="logo.png" alt="Chat_logo" style="width: 100px;display: block;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" class="img-circle" id="logo">
			</center>
			<div class="form-control" style="display: block;height: 350px;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" id="login">
				<div style="height: 50px;"></div>
				<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);padding: 10px;">
					<form method="POST" action="login.php">
					<div class="form-group has-feedback has-feedback-left">
					    <label class="control-label" id="login">Username</label>
					    <input type="text" class="form-control" placeholder="Username" id="input_user" name="user" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" />
					    <i class="glyphicon glyphicon-user form-control-feedback"></i>
					</div>

					<div class="form-group has-feedback has-feedback-left">
					    <label class="control-label" id="login">Password</label>
					    <input type="password" class="form-control" placeholder="Password" id="input_pass" name="pass" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" />
					    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
					</div>

					<center>
						<input type="submit" name="submit" value="LOGIN" role="button" class="btn btn-info btn-md" id="login" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);"><br>
						
					</center>
					</form>
					<p class="text-left" id="login"><a href="sign_up.php" >Sign-up</a></p>
				</div>
			</div>
			
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
</body>
<?php
exit();	
}
?>

<!-- CHAT HOME -->
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="icon.png" type="image/gif">
	<title>Simple Chat App</title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Chat Application">
	<meta name="keywords" content="Chat,Application">
	<meta name="author" content="Aljon C. Tocayon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body style="background-image: url('background.jpg');">
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12"></div>
			<div class="col-md-4 col-sm-12">
				<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 100%;">
					<div class="page-header">
						<h3><b>WELCOME!</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']; ?>
							<form action="logout.php" method="POST">
								<input type="submit" name="submit" value="LOGOUT" class="btn btn-danger btn-xs pull-right" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);">
							</form>
						</h3>
					</div>

					<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 430px;overflow: auto;">
						<center>Inbox<hr></center><br>
						<?php
							
							$con = mysqli_connect('localhost', 'root', '', 'chatbox');

								$username =  $_SESSION['username'];

								$select = $con->query("SELECT * FROM users WHERE username = '$username'");
								$res = mysqli_fetch_assoc($select);
								$selected = $res['id'];
								$user = $res['username'];

								

								 
								 	$query = $con->query("SELECT DISTINCT  thread_num,sender FROM msg_logs WHERE receiver = '$selected'");
									while ($row = mysqli_fetch_assoc($query)) {
									$sender = $row['sender'];
									$check = $con->query("SELECT username FROM users WHERE id = '$sender'");
									$res_check = $check->fetch_assoc();
									$user_sender = $res_check['username'];
									echo "<form action='display.php' method='POST'>";
									echo "<img src='user.png' style='width:50px;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);' class='img-circle'>&nbsp;&nbsp;&nbsp;&nbsp;";
									// echo "<input type='submit' name='submit' value='".$row['sender']."' style='width:50%;height:40px;border:none;background-color:white;text-align:left;'>";
									echo "<a href='display.php?username=".$row['sender']."'>".$user_sender."</a>";
									echo "<br><br>";
									echo "</form>";	 	
								 }
								 	
								 		

						?>
					</div>			
					<br>
					<p align="right">
						<a href="create_msg.php" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);">Create new message</a>
					</p>
				</div>
				
			</div>
			<div class="col-md-4 col-sm-12"></div>
		</div>
	</div>

</body>
</html>

