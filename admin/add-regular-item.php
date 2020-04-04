<?php
session_start();
include_once("../dbCon.php");
$conn =connect();
if(isset($_GET['edit-id'])){
  $id = $_GET['edit-id'];
  $sql="SELECT * FROM regular_menu_details where id = '$id'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
}
  if((isset($_POST["add"]))||(isset($_POST["edit"]))){
    //echo $_POST['image'];exit;
      $name= mysqli_real_escape_string($conn,$_POST['name']);
      $price= mysqli_real_escape_string($conn,$_POST['price']);
      $description= mysqli_real_escape_string($conn,$_POST['description']);
      $itemType= mysqli_real_escape_string($conn,$_POST['itemType']);

      /* 1st Image upload  */
      $image = 0;
      if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != ''){
        $target_dir = "../images/";
        $image = date('YmdHis_');
        $image .= basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false) {
            $uploadOk = 1;
          } else {
            $uploadOk = 0;
          }
        if (file_exists($target_file)) {
          $uploadOk = 0;
        }
        if ($_FILES["image"]["size"] > 5000000) {
          $uploadOk = 0;
        }
        if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
        }
        if ($uploadOk == 0) {
          $okFlag = FALSE;
        } else {
          if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          } else {
            $okFlag = FALSE;
          }
        }
      }else{
        $image = $_POST['image'];
      }


      if(isset($_POST['add'])){
      $sql="INSERT INTO `regular_menu_details`(`item_name`, `item_price`, `item_description`, `item_image`,`item_type`)
            VALUES ('$name','$price','$description','$image','$itemType')";
          //  echo $sql;exit;
      if($conn->query($sql)){
        $_SESSION['msg'] = array("Added Successfully","success");
        header('Location:regular-menu-details');
      }else{
        $_SESSION['msg'] = array("something Went wrong","danger");
          header('Location:regular-menu-details');
      }
    }

    if(isset($_POST['edit'])){

      if($image==0){
        $image = $row['item_image'];
      }

        //echo $image;exit;
      $id = $_GET['edit-id'];
    $sql="UPDATE `regular_menu_details` SET `item_name`='$name',`item_price`='$price',
          `item_description`='$description',`item_image`='$image',item_type='$itemType' WHERE `id` = '$id'";
    if($conn->query($sql)){
      $_SESSION['msg'] = array("Edited Successfully","info");
      header('Location:regular-menu-details');
    }else{
      $_SESSION['msg'] = array("something Went wrong","danger");
        header('Location:regular-menu-details');
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
              <h3 class="card-title"><?php if(isset($_GET['edit-id'])){ ?> Edit <?php }else{ ?> Add New <?php } ?> Item</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" id="addregular" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Item Name</label>
                  <input type="text" class="form-control" id="" name="name" placeholder="Enter item name" value="<?php if(isset($row)){ echo $row['item_name']; }  ?>">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Item Price</label>
                      <input type="text" class="form-control" id="" name="price" placeholder="Enter item name" value="<?php if(isset($row)){ echo $row['item_price']; }  ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Item Type</label>
                        <select class="form-control" name="itemType">
                          <option <?php if((isset($row)) && ($row['item_type'] == 'BreakFast')) echo"selected"; ?> value="BreakFast">BreakFast</option>
                          <option <?php if((isset($row)) && ($row['item_type'] == 'Lunch')) echo"selected"; ?> value="Lunch" >Lunch</option>
                          <option <?php if((isset($row)) && ($row['item_type'] == 'Dinner')) echo"selected"; ?> value="Dinner">Dinner</option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea type="text" class="form-control" row="4" id="" name="description" placeholder="Tell something about the item"  ><?php if(isset($row)){ echo $row['item_description']; } ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Add image</label>
                  <div class="input-group">
                    <div class="file">
                      <input type="file" class="custom-file-input" name="image"  id="exampleInputFile" >

                      <label class="custom-file-label" for="exampleInputFile"><span><?php if(isset($row)){ echo 'Add New Image'; }else{echo 'Choose An Item Image'; } ?></span></label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <?php if(isset($_GET['edit-id'])){ ?>
                <button type="submit" name="edit" class="btn btn-outline-info col-4">Edit</button>
              <?php }else{ ?>
                <button type="submit" name="add" class="btn btn-outline-success col-4">Submit</button>
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
        name: {
          required: true,
        },
        price: {
          required: true,
          number:true,
        },
        description: {
          required: true,
        },
        image: {
          <?php if(!isset($_GET['edit-id'])){ ?>
          required: true,
          <?php } ?>
          extension : "png|jpg|jpeg|gif",
        },
      },
      messages: {
        name: {
          required: "Please enter item name",
        },
        price: {
          required: "Please provide item price",
          number:"price must be numeric"
        },
        description: {
          required: "Please provide item description",
        },
        image: {
          <?php if(!isset($_GET['edit-id'])){ ?>
          required: "Please provide item Image",
          <?php } ?>
          extension: "Only JPG|JPEG|PNG|GIF files are allowed",
        },
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
  </script>
