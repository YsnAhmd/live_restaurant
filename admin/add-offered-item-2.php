<?php
session_start();
include_once("../dbCon.php");
$conn =connect();

if(isset($_POST['next'])){
  $id = $_POST['item_select'];
  echo $id;
  $sql="SELECT * FROM regular_menu_details where id='$id'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
}


if(isset($_GET['edit-id'])){
  $id = $_GET['edit-id'];
  $sql="SELECT * FROM `regular_menu_details` as r , offer_menu_details as o WHERE r.id = o.item_id AND isOffered = 1 AND o.id = '$id'";
  //echo $sql;exit;
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
}
  if((isset($_POST["addOffer"]))||(isset($_POST["editOffer"]))){
    //echo $_POST['image'];exit;
      $id= mysqli_real_escape_string($conn,$_POST['item_id']);
      $offerprice= mysqli_real_escape_string($conn,$_POST['offer_price']);
      $percentage= mysqli_real_escape_string($conn,$_POST['percentage']);
      $endDate= mysqli_real_escape_string($conn,$_POST['offer_end_date']);


      if(isset($_POST['addOffer'])){
      $sql="INSERT INTO `offer_menu_details`( `item_id`, `offer_price`, `percentage`, `end_date`)
      VALUES ('$id','$offerprice','$percentage','$endDate')";
      if($conn->query($sql)){
        $sql = "UPDATE `regular_menu_details` SET `isOffered`=1 WHERE id = '$id'";;
        $conn->query($sql);
        $_SESSION['msg'] = array("Offer Added Successfully","success");
        header('Location:regular-menu-details');
      }else{
        $_SESSION['msg'] = array("something Went wrong","danger");
          header('Location:regular-menu-details');
      }
    }

    if(isset($_POST['editOffer'])){
      $id = $_GET['edit-id'];
      $sql="UPDATE `offer_menu_details` SET `offer_price`='$offerprice',
            `percentage`='$percentage',`end_date`='$endDate' WHERE id = '$id'";
            //echo $sql;exit;
      if($conn->query($sql)){
        $_SESSION['msg'] = array("Edited Successfully","info");
        header('Location:offered-menu-details');
      }else{
        $_SESSION['msg'] = array("something Went wrong","danger");
          header('Location:offered-menu-details');
      }
  }

  }

?>
<?php include'includes/header.php'; ?>
<?php include'includes/navbar.php'; ?>
<?php include'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Add New Item </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" id="addregular" >
              <div class="card-body">
                <input type="hidden" name="item_id" value="<?=$row['id']?>">
                <input type="hidden" id="offer_price" name="offer_price" value="">
                <div class="form-group">
                  <label for="exampleInputEmail1">Item Name</label>
                  <input type="text" class="form-control" disabled  value="<?php if(isset($row)){ echo $row['item_name']; }  ?>">
                </div>
                <div class="row">

                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Regular Price</label>
                      <input type="text" class="form-control" id="oldPrice" disabled value="<?php if(isset($row)){ echo $row['item_price']; }  ?>">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Offer Percentage</label>
                      <input type="number" class="form-control" id="percentage" name="percentage" value="<?php if(isset($row)){ echo $row['percentage']; }  ?>" oninput="offerPrice()" placeholder="ex:20% or 30%">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Offer Price</label>
                      <input type="text" class="form-control" id="newPrice" value="<?php if(isset($row['offer_price'])){ echo $row['offer_price']; }  ?>"  disabled>
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Offer Ends at</label>
                  <input type="text" class="form-control" id="datepicker" name="offer_end_date" value="<?php if(isset($row['end_date'])){ echo $row['end_date']; }  ?>">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <?php if(isset($_GET['edit-id'])){ ?>
                <button type="submit" name="editOffer" class="btn btn-outline-info col-4">Edit</button>
              <?php }else{ ?>
                <div class="row">
                  <div class="col-6">
                    <a type="submit" href="add-offered-item" class="btn btn-outline-danger col-6">Back</a>
                  </div>
                  <div class="col-6">
                    <button type="submit" name="addOffer" class="btn btn-outline-success col-6">Submit</button>
                  </div>
                </div>
              <?php } ?>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include'includes/footer.php'; ?>

  <script type="text/javascript">
  $(document).ready(function () {

    $('#addregular').validate({
      rules: {
        percentage: {
          required: true,
          number:true,
        },
        offer_end_date: {
          required: true,

        }
      },
      messages: {
        percentage: {
          required: "Please enter offer Percentage",
          number:"percentage must be numeric"
        },
        offer_end_date: {
          required: "Please provide offer ending date",
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  function offerPrice(){
    let oP = $("#oldPrice").val();
    let percentage = $("#percentage").val();
    let newPrice = (oP*percentage)/100;
    let newP = oP - newPrice;
    $("#newPrice").val(newP);
    $("#offer_price").val(newP);
  }
  </script>
