<?php
session_start();
include_once("../dbCon.php");
$conn =connect();
  if(isset($_POST["submit"])){
      $email= mysqli_real_escape_string($conn,$_POST['email']);
      $password= mysqli_real_escape_string($conn,md5($_POST['password']));
      $sql="SELECT * FROM user_info where email ='$email' AND password='$password'";
        $result = $conn->query($sql);
          $row = mysqli_fetch_assoc($result);
            if($result->num_rows>0 && $row['user_type']==0){
              $_SESSION['isLoggedIn']=TRUE;
      				$_SESSION['email']=$row['email'];
      				$_SESSION['name']=$row['name'];
              header('Location:dashboard');
      		}else{
            header('Location:index');
            $_SESSION['msg'] = 'Login invalid';
          }
  }
?>
