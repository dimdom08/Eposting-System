<?php

session_start();  
if(!isset($_SESSION["user"]))
{
 echo "<script>alert('Please login first.');</script>";
 header("location:../index.php");
}


//import the connection to the database
//	    " .. " = go back / back 

include "../db/connection.php";
include "../processes/process.php";


?> 

<!DOCTYPE html>
<html>
<head>
	<title>Eposting</title>
	<nav style="float:right;">
		<?php 
			$username = $_SESSION['user']; 
			echo "Hi, $username";
		?> 
		| <a href="managepost.php?action=logout">Logout</a>
	</nav>
</head>
<body style="padding:20px;">
	<div>
		<br>
		<br>
	<?php
	if(empty($_GET)){
	?>

		<a href='index.php'>Back to Homepage</a>
		<h1>Create a Post</h1> 
		<hr>
		<form method="post" enctype="multipart/form-data">
  
			<input type="hidden" name="poseremail" value="<?php echo $username; ?>" required><!-- This is the email of the poser-->
			<label>Title</label><br>
			<input type="text" name="title" placeholder="Edit text here..." required><!-- This is the title of the post-->
			<br><br>
			<label>Content</label><br>
			<textarea type="text" name="content"  rows="4"  placeholder="Edit text here..." required></textarea><!-- This is the content of the post-->
			<br><br>
			<button type="submit" name="postbtn">Post</button>

		</form> 
	<?php
	}//CLOSER OF EMPTY GET


//////////////////////////////	FOR EDITING OF POST /////////////////////////////


	if(isset($_GET['editpost'])){
	 $postid = $_GET['editpost'];

	 $getpost = $con->query("SELECT * FROM posts WHERE pid = '$postid'  ");
	 while($data = mysqli_fetch_assoc($getpost)){ 
	?>
		
		<a href='index.php'>Back to Homepage</a>
		<h1>Editing Post</h1> 
		<hr>
		<form method="post" enctype="multipart/form-data">
 

			<input type="hidden" name="postid" value="<?php echo $data['pid']; ?>" ><!-- this is the id of the post -->
			<label>Title</label><br>
			<input type="text" name="edittitle" value="<?php echo $data['ptitle']; ?>" required><!-- This is the title to be edited  -->
			<br><br>
			<label>Content</label><br>
			<textarea type="text" name="editcontent" rows="4"   required><?php echo $data['pcontent']; ?></textarea><!-- This is the content to be edited  -->
			<br><br>
			<button type="submit" name="editbtn">Edit Post</button>

		</form> 

	<?php
		}//while loop closer
	}//if iisset edit closer



//////////////////////////////	FOR LOGGING OUT /////////////////////////////

	
	if(isset($_GET['action'])){  
	?>
	<center>
		 <h4>Are you sure to log out?</h4>
		<form method="post" enctype="multipart/form-data"> 
			<button type="submit" name="yesbtn">Yes</button> | <button type="submit" name="nobtn">No</button> 
		</form> 
	</center>

	<?php  
	}//if isset action closer
	?>

	</div>
</body>
</html>