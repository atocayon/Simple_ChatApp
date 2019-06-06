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
<style type="text/css">
	.bubble-left{
			width: 100%;
			height: auto;
			background-color: #f1f1f1;
			padding: 10px;
			position: relative;
			margin-top: 22px;
			border-radius: 5px;
		}
		.bubble-left:before{
			content: "";
			position: absolute;
			right:98%;
			top:0;
			width:0;
			height:0;
			border-bottom: 26px solid transparent;
			border-right: 28px solid #f1f1f1;
		}

		.bubble-right{
			width: 100%;
   			height: auto;
			background-color: navy;
			padding: 10px;
			position: relative;
			margin-top: 22px;
			border-radius: 5px;
			color: white;
		}
		.bubble-right:before{
			content: "";
			position: absolute;
			left:98%;
			top:0;
			width:0;
			height:0;
			border-bottom: 26px solid transparent;
			border-left: 28px solid navy;
		}
</style>

</head>
<body style="background-image: url('background.jpg');">

<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 100%;">
					<form action="new_msg_action.php" method="POST">
					<div class="page-header">
						<h3><b>WELCOME!</b>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']; ?>
							<a href="index.php" class="btn btn-warning btn-xs">HOME</a>
						</h3>

						<input type="text" name="user" value="<?php echo $_GET['radio']; ?>" hidden>
						<?php
						$ctact = $_GET['radio'];
						$con1 = mysqli_connect('localhost', 'root','','chatbox');
						$contact = $con1->query("SELECT username FROM users WHERE id = '$ctact'");
						$res_contact = $contact->fetch_assoc();
						$sel_contact = $res_contact['username'];
						?>
						<input type="text" name="contact" value="<?php echo $sel_contact ?>">
						<button class="btn btn-danger btn-xs"><a href="list.php" style="text-decoration: none;color: white;">Contacts</a>
						</button>
					</div>

					<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;height: 250px;overflow: auto;">

						<?php
							
							$con = mysqli_connect('localhost', 'root', '', 'chatbox');


								$username =  $_SESSION['username'];
								$receiver = $_GET['radio'];
								$thread_num = rand();


								$select = $con->query("SELECT * FROM users WHERE username = '$username'");
								$res = $select->fetch_assoc();
								$selected = $res['id'];
								$user = $res['username'];

								$check = $con->query("SELECT `thread_num` FROM logs WHERE user1 = '$selected' AND user2 = '$receiver' OR user1 = '$receiver' AND user2 = '$selected'");
								$check_res = $check->fetch_assoc();
      							$num = $check_res['thread_num'];
      							if (mysqli_num_rows($check)==0) {
									$insert1 = $con->query("INSERT INTO logs (thread_num, user1, user2) VALUES ('$thread_num', '$selected', '$receiver')");
									
								}
      							

								

								$display = $con->query("SELECT * FROM msg_logs WHERE thread_num = '$num' AND  sender = '$selected' AND receiver = '$receiver' OR sender = '$receiver' AND receiver = '$selected'");

										if ($display->num_rows) {
											while ($row = $display->fetch_assoc()) {
												if ($selected == $row['sender']) {
													echo "<div class='row'>";
													echo "<div class='col-md-9'>";
													echo "<div class='bubble-right' >";
													echo $row['msg']."<br>";
													echo "</div></div><div class='col-md-3'>";
													echo "<img src='user.png' style='width:30px;width:50px;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);' class='img-circle' ><span>&nbsp;&nbsp;&nbsp;Me</span>";
													echo "</div></div><br><br>";
												}else{
													echo "<div class='row'>";
													echo "<div class='col-md-3'>";
													echo "<img src='user.png' style='width:30px;width:50px;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);' class='img-circle'>";
													echo "</div>";
													echo "<div class='col-md-9'>";
													echo "<div class='bubble-left' >";
													echo $row['msg']."<br>";
													echo "</div></div></div><br><br>";
												}
												
											}
										}
										else{
											echo "No Results";
										}
									
					   

						?>			
						
					</div>
					<br>
						
							<label>Enter Your Message:</label>
							<textarea class="form-control" name="msg" id="msg" placeholder="Your Message..." required></textarea><br>
							<input type="submit" id="submit" name="send" style="width: 100%;" class="btn btn-success btn-xs" value="Send">
					</form>
				</div>
				
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>


</body>
</html>