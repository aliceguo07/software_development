<html>
<head><title> register</title></head>
<body>

<?php
	# operator
	echo '<link rel="stylesheet" type="text/css" href="style.css"></head>'; 
	$con = new mysqli("localhost", "root", "");
	if(!$con){
		die('Could not connet: '. mysqli_error());
	}

	$sql = "CREATE DATABASE IF NOT EXISTS ECOMMERCE";
	$con->query($sql);
	$sql = "use ECOMMERCE";
	$con->query($sql);	
	$sql = "CREATE TABLE IF NOT EXISTS `USERS` (
    `ID` varchar(255) NOT NULL,
    `EMAIL` varchar(255) NOT NULL default '',
    `PASSWORD` varchar(255) NOT NULL default '',
    PRIMARY KEY  (`ID`)
	)";
	$con->query($sql);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$check = mysqli_query($con, "SELECT * FROM USERS WHERE ID = '".$name."'");
	if(mysqli_num_rows($check) > 0){
		header("Location: name.html");
		exit;
	} else {
		$check = mysqli_query($con, "SELECT * FROM USERS WHERE EMAIL = '".$email."'");
		if(mysqli_num_rows($check) > 0){
			header("Location: email.html");
			exit;
		}else{
			$check = mysqli_query($con, "INSERT INTO USERS (ID, EMAIL, PASSWORD) VALUES ('".$name."', '".$email."', '".$password."')");
			header("Location: success.html");
			exit;
		
		}
	}
?>

</body>
</html>