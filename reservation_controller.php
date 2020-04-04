<?php
session_start();
include_once("dbCon.php");
$conn =connect();

	if(isset($_POST['reserve'])){

		$date= mysqli_real_escape_string($conn,$_POST['date']);
		$time= mysqli_real_escape_string($conn,$_POST['time']);
		$person= mysqli_real_escape_string($conn,$_POST['person']);
		$phone= mysqli_real_escape_string($conn,$_POST['phone']);
		$user_id = $_SESSION['id'];
		$amount = mysqli_real_escape_string($conn,$_POST['amount']);
		$_SESSION['data'] = ['date'=>$date,'time'=>$time,'person'=>$person,'phone'=>$phone,'amount'=>$amount];

		$sql = "SELECT * FROM reservation WHERE res_date = '$date' AND res_time = '$time'";
		$result = $conn->query($sql);
		if($result->num_rows>0){

 			header('Location:reservation');
		}else{
		header('Location:checkout-payment');

	}

}




?>
