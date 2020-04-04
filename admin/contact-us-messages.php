<?php session_start();
include_once("../dbCon.php");
$conn =connect();
  $sql="SELECT * FROM contact_us";
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All messages</h3>
          </div>

          <div class="card-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($result as $key => $value) {
                 ?>
              <tr>
                <td><?php $x = ($key+1); echo $x; ?></td>
                <td><?=$value['name'];?></td>
                <td><?=$value['email'];?></td>
                <td><?=$value['message'];?></td>
                <td><?=$value['date'];?></td>
              </tr>
                  <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
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
