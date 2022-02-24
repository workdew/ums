<?php
require_once('data.php');


if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$sql = "SELECT * FROM `users` WHERE email = '$email'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : idealwork2242@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}

	}else{
		echo "Email does not exist in database";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
  
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container.forgot">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <form id="register-form" role="form" autocomplete="off" class="form" method="post">    
        <h2 class="Reset"> Reset Password</h2>
        <div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
			  <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
			</div>
		  </div>
		  <div class="form-group">
			<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
      
		  </div>
		  
		  <input type="hidden" class="hide" name="token" id="token" value=""> 
		</form>
</div>
</body>
</html>