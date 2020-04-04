<?php
session_start();

		$mailto = $_SESSION['email'];
		$mailSub 	= "Reservation Receipt of Live Restaurant";
		$message	= 'Reservation Complete on '.$_SESSION['data']['date'].' at '.$_SESSION['data']['time'].' PM. </br>';
		$message	.= 'You have paid total BDT'.$_SESSION['data']['amount'].' with '.$_SESSION['data']['card_type'].' . </br>';
    $message  .= 'Your transaction Id is '.$_SESSION['data']['tran_id'].' .';
		$mailMsg 	= $message;
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail	= new PHPMailer();
		$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' 		=> false,
			'verify_peer_name' 	=> false,
			'allow_self_signed' => true
		)
		);
		$mail ->IsSmtp();
		$mail ->SMTPDebug = 0;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = "smtp.gmail.com";
		// $mail ->Port = 465; // or 587
		$mail ->Port = 465; // or 587
		$mail ->IsHTML(true);
		$mail ->Username = "live.restaurant12@gmail.com";
		$mail ->Password = "livemenu123";
		$mail->setFrom('OnTrac BD', 'OnTrac BD');
		$mail ->Subject = $mailSub;
		$mail ->Body = $mailMsg;
		$mail ->AddAddress($mailto);
    unset($_SESSION['data']);
			if(!$mail->Send())
			{
        echo "<script>alert('Mail can not be sent');</script>";
			}
			else
			{
        echo '<script>alert("Mail sent");</script>';
			}
      echo '<script>window.location.href="index";</script>';
?>
