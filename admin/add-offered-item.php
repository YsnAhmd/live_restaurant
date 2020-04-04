<?php
session_start();
include_once("../dbCon.php");
$conn =connect();

$sql="SELECT * FROM regular_menu_details where isOffered = 0";
$result = $conn->query($sql);
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
              <h3 class="card-title">Add New Item</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="add-offered-item-2" >
              <div class="card-body">
                <div class="form-group ">
                  <label>Select Item Name</label>
                  <select class="form-control select2" name="item_select" style="width: 60%;">
                    <!-- <option disable="disabled" selected="selected">Select From Here</option> -->
                    <?php foreach ($result as $value) {?>
                    <option value="<?=$value['id']?>"><?=$value['item_name']?></option>
                   <?php } ?>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="next" class="btn btn-outline-success col-4">Next</button>
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
