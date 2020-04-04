<?php
session_start();
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("ass5e879e9e5a9fa");
$store_passwd=urlencode("ass5e879e9e5a9fa@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
#curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
#curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$card_type = $result->card_type;

  # Insert reservation into datatbase
	include_once("dbCon.php");
	$conn =connect();
  $date= $_SESSION['data']['date'];
  $time= $_SESSION['data']['time'];
  $person= $_SESSION['data']['person'];
  $phone= $_SESSION['data']['phone'];
  $amount= $_SESSION['data']['amount'];
	$_SESSION['data'] += ['card_type'=>$card_type,'tran_id'=>$tran_id];
	//print_r($_SESSION['data']);exit;
  $user_id = $_SESSION['id'];
  $sql = "INSERT INTO `reservation`(`user_id`, `res_date`, `res_time`, `res_person`, `res_amount`, `res_contact`,`card_type`,`transaction_date`,`transaction_id`)
          VALUES ('$user_id','$date','$time','$person','$amount','$phone','$card_type','$tran_date','$tran_id')";

  if($conn->query($sql)){
		echo '<script>window.location.href="mail";</script>';
  }else{
		echo '<script>window.location.href="500";</script>';
  }

} else {

	echo "Failed to connect with SSLCOMMERZ";
}

 ?>
