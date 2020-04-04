<?php session_start();
include_once("../dbCon.php");
$conn =connect();
  $sql="SELECT * FROM regular_menu_details Order By item_name ASC ";
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
        <!-- /.card-header -->
        <?php if(isset($_SESSION['msg'])){ ?>
          <div class="card msg bg-<?php echo $_SESSION['msg'][1]; ?> ">
            <div class="card-body">
              <?php echo $_SESSION['msg'][0]; unset($_SESSION['msg']); ?>
            </div>
            <!-- /.card-body -->
          </div>
        <?php } ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Menu Details</h3>
          </div>

          <div class="card-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Image</th>
                <th>Offered</th>
                <th>Edit Item</th>
                <th>Delete Item</th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($result as $key => $value) {
                 ?>
              <tr>

                <td><?php $x = ($key+1); echo $x; ?></td>
                <td><?=$value['item_name'];?></td>
                <td><?=$value['item_description'];?></td>
                <td><?=$value['item_price']; ?> tk</td>
                <td><?=$value['item_type']; ?></td>
                <td><img src="../images/<?=$value['item_image'];?>" height="70px" width="120px" alt="<?=$value['item_name'];?>"></td>
                <td><?php if($value['isOffered']==1){ echo 'Yes'; }else{ echo 'No';} ?></td>
                <td><a href="add-regular-item?edit-id=<?=$value['id'];?>" class="btn btn-outline-info"><i class="fas fa-edit" ></i> Edit</a></td>
                <td><a href="delete-item?delete-id=<?=$value['id'];?>" onclick="return confirm('Are You sure? the data cannot be reverted. ');" class="btn btn-outline-danger" ><i class="fas fa-trash" ></i> Delete</a></td>

              </tr>
                  <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Image</th>
                <th>Offered</th>
                <th>Edit Item</th>
                <th>Delete Item</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include'includes/footer.php'; ?>
