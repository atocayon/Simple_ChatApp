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
						<h3>Create New Account</h3>
					</div>
					<div style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);background-color: white;padding: 20px;overflow: auto;">
						<form method="POST" action="sign_up_action.php">
							<div class="form-group has-feedback has-feedback-left">
							    <label class="control-label" id="login">New Username:</label>
							    <input type="text" class="form-control" placeholder="New Username" id="input_user" name="user" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" />
							    <i class="glyphicon glyphicon-user form-control-feedback"></i>
							</div>

							<div class="form-group has-feedback has-feedback-left">
							    <label class="control-label" id="login">New Password:</label>
							    <input type="password" class="form-control" placeholder="New Password" id="input_pass" name="pass" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" />
							    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
							</div>

							<div class="form-group has-feedback has-feedback-left">
							    <label class="control-label" id="login">Confirm Password:</label>
							    <input type="password" class="form-control" placeholder="Confirm New Password" id="input_cpass" name="cpass" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);" />
							    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
							</div>

							<center>
								<input type="submit" name="submit" value="Sign-up" role="button" class="btn btn-info btn-md" id="login" style="box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);"><br>
								
							</center>
						</form>
					</div>
					<br>
					
				</div>
				
			</div>
			<div class="col-md-4 col-sm-12"></div>
		</div>
	</div>

</body>
</html>