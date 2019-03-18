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

//for deleting of post
if(isset($_GET['delete_pid'])){
	$pid = $_GET['delete_pid'];

	$delpost = $con->query("DELETE FROM posts WHERE pid='$pid' ");
	if($delpost){
		echo "<script>alert('Delete Successful');</script>";
	}
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Eposting</title>
	<script type="text/javascript">
		function del_pid($pid){
			if(confirm("Are you sure on deleting this post?")){
				window.location.href="index.php?delete_pid="+$pid;
			}
		}
	</script>
	<style type="text/css">
		p { padding-left:30px;  }
		.postclass { background-color:#eee; padding:10px; border: 2px ridge #aaa;}
		.placeleft { float:right; }
	</style>

	<!-- the topmost part of the page -->
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
		<h1>EPosts (Elmer's Posting system)</h1>

		<a href='managepost.php'><button>Make a post</button></a>

		<hr>
		<?php
		//get all the posts on the database
		$posts = $con->query("SELECT * FROM posts ORDER BY ptimedone DESC");
		while($data  =  mysqli_fetch_assoc($posts)){
		?>

			<div class='postclass' >

				<!--This is the posers email and the condition of edit and delet if it is his post-->
				 <h5>
				  		Poser: <?php echo $data['poseremail']; ?> 

				  		<?php 
				  		//if the poser is the username account that is logged in then display edit and delete
				  		if($username == $data['poseremail']){
				  		?>
				  			<small class='placeleft'>
								<a href='managepost.php?editpost=<?php echo $data['pid']; ?>'>Edit</a> |
								<a href='javascript:del_pid(<?php echo $data['pid']; ?>)'>Delete</a> 
							</small>
						<?php
						} //closer of if
						?>
				 </h5>
				
				<!--This is the post title and the content of the post-->
				 <h2><?php echo $data['ptitle']; ?></h2> 
					  <p >
						<?php echo $data['pcontent']; ?><br><br>
						<small >Posted: <?php echo  dateformatted($data['ptimedone']); ?></small>
						<br><br>
					  </p>
			</div> 
			<br>
			<br> 


		<?php
		}
		?> 

	</div>
</body>
</html>