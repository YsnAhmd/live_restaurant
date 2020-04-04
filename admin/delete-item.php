<?php session_start();
include_once("../dbCon.php");
$conn =connect();
  if(isset($_GET['delete-id'])){
    $id=$_GET['delete-id'];
    $sql="DELETE FROM `regular_menu_details` WHERE id='$id'";
    if($conn->query($sql)){
      $_SESSION['msg'] = array("Deleted Successfully","danger");
      header('Location:regular-menu-details');
    }else{
      $_SESSION['msg'] = array("something Went wrong","danger");
        header('Location:regular-menu-details');
    }
  }
  if(isset($_GET['close-id'])){
    $id=$_GET['close-id'];
    $item_id=$_GET['item-id'];
    $sql="DELETE FROM `offer_menu_details` WHERE id='$id'";
    $ssql="UPDATE `regular_menu_details` SET `isOffered`= 0 WHERE id='$item_id'";
    if($conn->query($sql) && $conn->query($ssql)){
      $_SESSION['msg'] = array("Closed Successfully","danger");
      header('Location:offered-menu-details');
    }else{
      $_SESSION['msg'] = array("something Went wrong","danger");
        header('Location:offered-menu-details');
    }
  }

  if(isset($_GET['cancel-reservation'])){
    $id=$_GET['cancel-reservation'];
    $sql="UPDATE `reservation` SET `isCancelled` = 1 WHERE id='$id'";
    if($conn->query($sql)){
      $_SESSION['msg'] = array("Cancelled Successfully","danger");
      header('Location:reservations');
    }else{
      $_SESSION['msg'] = array("something Went wrong","danger");
        header('Location:reservations');
    }
  }
?>
