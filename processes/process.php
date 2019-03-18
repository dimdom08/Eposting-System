<?php
//import the connection to the database


//login process
if(isset($_POST['loginbtn'])){
//get the value of the field and put into the php variable
// php variable <= html input
	$username = $_POST['accname'];
	$userpass = $_POST['accpass'];

	//check if account is existing on the database
	$sql = $con->query("SELECT * FROM `loginaccounts` WHERE `username` = '$username' AND `userpass`='$userpass' ");
	$accountfound = mysqli_num_rows($sql);
	if($accountfound == 1 ){

		$_SESSION['user'] = $username;
		echo "<Script> window.location.href='homepage/index.php'; </script> ";

	}else{
		echo "<script> alert('Login account Error'); </script>"; 
	}


}


//registration process
if(isset($_POST['registerbtn'])){
//get the value of the registration field and put into the php variable
// php variable <= html input
	$fullname = $_POST['registerfullname'];
	$username = $_POST['registername'];
	$userpass = $_POST['registerpass'];

	//insert account on the database
	$insert = $con->query("INSERT INTO `loginaccounts` (`fullname`, `username`, `userpass`) VALUES('$fullname', '$username', '$userpass')");

	if($insert){

		$_SESSION['user'] = $username;
		echo "<script>alert('Welcome  $_SESSION[user] to Eposting' ); window.location.href='homepage/index.php'; </script> ";

	}else{
		echo "<script> alert('Login account Error'); </script>"; 
	}


}


//creating a post process
if(isset($_POST['postbtn'])){
//get the value of the managepost.php field and put into the php variable
// php variable <= html input   
	$poseremail = $_POST['poseremail'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	//insert account on the database
	$post = $con->query("INSERT INTO `posts` (`poseremail`, `ptitle`, `pcontent` ) VALUES( '$poseremail', '$title', '$content')");

	if($post){

		 
		echo "<script>alert('Posted Successfully.' ); window.location.href='index.php'; </script> ";

	}else{
		echo "<script> alert('Posting Error'); </script>"; 
	}


}


//editing a post process
if(isset($_POST['editbtn'])){
//get the value of the managepost.php field 
	$postid = $_POST['postid'];  
	$edittitle = $_POST['edittitle'];
	$editcontent = $_POST['editcontent'];

	//insert account on the database
	$editpost = $con->query("UPDATE `posts` SET `ptitle`='$edittitle', `pcontent`='$editcontent' WHERE `pid`='$postid'  "); 
	if($editpost){

		 
		echo "<script>alert('Post Edited Successfully.' ); window.location.href='index.php'; </script> ";

	}else{
		echo "<script> alert('Editing Error'); </script>"; 
	}


}


function dateformatted($pdateposted){
	return date("l h:i:A F j, Y",strtotime($pdateposted));
}


//for the logout btn
if(isset($_POST['yesbtn'])){

	session_start();
	unset($_SESSION['user']);
	header("Location:../index.php");

}

//for the logout no btn
if(isset($_POST['nobtn'])){ 
	header("location:index.php");
}


?>