<html>
<head><title> sign in</title></head>
<body>
<?php
	# operator
	echo '<link rel="stylesheet" type="text/css" href="style.css"></head>'; 
	$con = new mysqli("localhost", "root", "", "ECOMMERCE");
	if(!$con){
		die('Could not connet: '. mysqli_error());
	}
	$email = $_POST['email'];
	$password = $_POST['password'];

	$check = mysqli_query($con, "SELECT * FROM USERS WHERE EMAIL = '".$email."'");
	if(!$check||mysqli_num_rows($check) == 0){
		echo "<p>user not exist<p> <a href='signup.html' class='form-create-an-account'>Create an account &rarr;</a>";
	}
	else{
		$row = mysqli_fetch_assoc($check);
		if($password == $row["PASSWORD"]){
			 $_SESSION['valid'] = true;
             $_SESSION['username'] = $row["ID"];
			echo "<p>Welcome, ".$_SESSION['username']."<p>";
		}else{
			echo "<p>wrong password<p> <a href='signin.html' class='form-create-an-account'>sign in &rarr;</a>";
		}
	}
?>
</body>
</html>