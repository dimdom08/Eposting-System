<?php

 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:homepage/index.php");  
 }  


#     folder/file to be connected
include "db/connection.php";
include "processes/process.php";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Eposting</title>
</head>
<body>
	<center>
	<h1>Eposting</h1><hr>
	<?php
/////////////////////////////////FOR THE LOGIN OF USER UI///////////////////////////////////////////////////////

	 if(empty($_GET)){  //if get is empty 
	?>

		<h2>Login   <!-- get method is anchored --></h2>
		<form method="post" enctype="multipart/form-data">
 
			<label>Username</label>
			<input type="email" name="accname"  placeholder="elmer@eposting.com"  required>
			<br>
			<label>Password</label>
			<input type="password" name="accpass"  placeholder="123"  required>
			<br><br>
			<button type="submit" name="loginbtn">Login</button>

		</form> 
		<br>
		<a href='index.php?register=newaccount'>Register</a>
	<?php 

		}//closer of empty get 

/////////////////////////////////FOR THE REGISTRATION OF USER UI///////////////////////////////////////////////////////


		if(isset($_GET['register']) && $_GET['register'] == "newaccount"){  
	?>


		<h2>Registration </h2>
		<form method="post" enctype="multipart/form-data">

			<label>Fullname</label>
			<input type="text" name="registerfullname" required>
			<br>
			<label>Username</label>
			<input type="email" name="registername" required>
			<br>
			<label>Password</label>
			<input type="password" name="registerpass" required>
			<br><br>
			<button type="submit" name="registerbtn">Register</button>
			

		</form>
		<br>
		<a href='index.php'>Login</a><!-- get method is anchored -->


	
	<?php
		}//closer of isset get register

	?>
	</center>
</body>
</html>