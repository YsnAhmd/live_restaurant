<?php
session_start();
include_once("dbCon.php");
$conn =connect();
if(isset($_POST['send'])){
	$name= mysqli_real_escape_string($conn,$_POST['name']);
	$email= mysqli_real_escape_string($conn,$_POST['email']);
	$message= mysqli_real_escape_string($conn,$_POST['message']);
  $date = date('d-m-Y');
	$sql="INSERT INTO `contact_us`(`name`, `email`, `message`,`date`)
				VALUES ('$name','$email','$message','$date')";
				//echo $sql;exit;
	if($conn->query($sql)){
		$_SESSION['msg'] = "Your message have been sent!!!";
		header('Location:contact');
	}
}
