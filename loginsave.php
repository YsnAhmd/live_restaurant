<?php
		session_start();
		include_once("dbCon.php");
		$conn =connect();
		  if(isset($_POST["submit"])){
		      $email= mysqli_real_escape_string($conn,$_POST['email']);
		      $password= mysqli_real_escape_string($conn,md5($_POST['password']));
		      $sql="SELECT * FROM user_info where email ='$email' AND password='$password'";
					//echo $sql;exit;
		        $result = $conn->query($sql);
		          $row = mysqli_fetch_assoc($result);
		            if($result->num_rows>0 && $row['user_type']==1){
		              $_SESSION['isLoggedIn']=TRUE;
		      				$_SESSION['email']=$row['email'];
		      				$_SESSION['name']=$row['name'];
		      				$_SESSION['id']=$row['id'];
		              header('Location:index');
		      		}else{
		            $_SESSION['msg'] = 'Login invalid';
			            header('Location:login');
		          }
		  }
 ?>
