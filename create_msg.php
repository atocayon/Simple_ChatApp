<?php
session_start();

?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


</head>
<body style="background-image: url('background.jpg');">

	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 100%;">
					<form action="#" method="POST">
					<div class="page-header">
						<h3><b>WELCOME!</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']; ?>
							<a href="index.php" class="btn btn-warning btn-xs">HOME</a>
						</h3>

						<input type="text" name="user" placeholder="Enter Recipient" required> <button class="btn btn-danger btn-xs"><a href="list.php" style="text-decoration: none;color: white;">Contacts</a></button>
					</div>

					<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 250px;overflow: auto;">

						<p>Nothing to Show....</p>
						
					</div>
					<br>
						
							<label>Enter Your Message:</label>
							<textarea class="form-control" name="msg" id="msg" required></textarea><br>
							<input type="submit" id="submit" name="send" style="width: 100%;" class="btn btn-success btn-xs" value="Send">
					</form>
				</div>
				
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>


</body>
</html>
