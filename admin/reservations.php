<?php session_start();
include_once("../dbCon.php");
$conn =connect();
  $sql="SELECT * , r.id as res_id FROM reservation as r, user_info as u WHERE r.user_id = u.id AND isCancelled = 0 Order By res_date ASC ";
  //echo $sql;
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
            <h3 class="card-title">All Reservation Details</h3>
          </div>

          <div class="card-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Reserved Date</th>
                <th>Reserved time</th>
                <th>Reserved By</th>
                <th>Total Person</th>
                <th>Contact</th>
                <th>Amount</th>
                <th>Transaction Date</th>
                <th>Card Type</th>
                <th>Cancel </th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($result as $key => $value) {
                 ?>
              <tr>

                <td><?php $x = ($key+1); echo $x; ?></td>
                <td><?=$value['res_date'];?></td>
                <td><?=$value['res_time'];?></td>
                <td><?=$value['name']; ?></td>
                <td><?=$value['res_person']; ?></td>
                <td><?=$value['res_contact']; ?></td>
                <td><?=$value['res_amount']; ?></td>
                <td><?=$value['transaction_date']; ?></td>
                <td><?=$value['card_type']; ?></td>
                <td><a href="delete-item?cancel-reservation=<?=$value['res_id'];?>" onclick="return confirm('Are You sure? the data cannot be reverted. ');" class="btn btn-outline-danger" ><i class="fas fa-trash" ></i> Cancel</a></td>
              </tr>
                  <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Reserved Date</th>
                <th>Reserved time</th>
                <th>Reserved By</th>
                <th>Total Person</th>
                <th>Contact</th>
                <th>Amount</th>
                <th>Transaction Date</th>
                <th>Card Type</th>
                <th>Cancel </th>
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
