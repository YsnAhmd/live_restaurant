<?php session_start(); ?>
<?php include'includes/header.php'; ?>
<?php
include_once("../dbCon.php");
$conn =connect();
  //PIE Chart 1 ALL MENUS
  $piesql1 = "SELECT SUM(isOffered = 0) as 'regular',SUM(isOffered = 1) as 'offered' FROM regular_menu_details";
  $result = $conn->query($piesql1);
  //PIE Chhart 2 All reservations
  $piesql2 = "SELECT SUM(isCancelled = 0) as 'ongoing',SUM(isCancelled = 1) as 'cancelled' FROM reservation";
  $result2 = $conn->query($piesql2);

  $barsql = "SELECT `res_date`, SUM(isCancelled = 0) as 'ongoing' FROM `reservation` GROUP BY res_date";
  $result3 = $conn->query($barsql);


    //  exit;


?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<style media="screen">
.chart {
width: 100%;
min-height: 300px;
}
.piechart {
width: 100%;
min-height: 250px;
}
</style>
<script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'date');
          data.addColumn('number', 'reservation');
          data.addRows([
            <?php
            while($row3=mysqli_fetch_assoc($result3))
                {
                  echo "['".$row3["res_date"]."',".$row3["ongoing"]."],";
                }
              ?>
          ]);

         var options = {
           title: 'Total reservation in current month',
           legend:'left',
           is3D:true,
         };

    var chart = new google.visualization.ColumnChart(
      document.getElementById('chart_div'));

    chart.draw(data, options);

  }

/////////////////////////////////////////////////////////////////////////////

        google.charts.setOnLoadCallback(pie1);

        function pie1() {
          var data = google.visualization.arrayToDataTable([
            ['Menu', 'Total'],
            <?php
            while($row=mysqli_fetch_assoc($result))
                {
                  echo "['Regular',".$row["regular"]."],";
                  echo "['Offered',".$row["offered"]."],";
                }

             ?>
          ]);

          var chart = new google.visualization.PieChart(document.getElementById('pie1'));

          chart.draw(data, { title: 'Total Menu', is3D:true});
        }
/////////////////////////////////////////////////////////////////
        google.charts.load("current", {packages:["imagepiechart"]});
            google.charts.setOnLoadCallback(pie2);

            function pie2() {
              var data = google.visualization.arrayToDataTable([
                ['Ongoing', 'Cancelled'],
                <?php
                while($row2=mysqli_fetch_assoc($result2))
                    {
                      echo "['Ongoing',".$row2["ongoing"]."],";
                      echo "['Cancelled',".$row2["cancelled"]."],";
                    }

                 ?>
              ]);

              var chart = new google.visualization.PieChart(document.getElementById('pie2'));

              chart.draw(data, {is3D:true, title: 'Reservation'});
            }


  $(window).resize(function(){
    drawStuff();
  });

</script>

<?php include'includes/navbar.php'; ?>
<?php include'includes/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row col-md-12">
          <div class="col-md-6">
             <div id="pie1" class="piechart"></div>
          </div>
          <div class="col-md-6">
               <div id="pie2" class="piechart "></div>
          </div>
        </div>
        <hr>
        <div class="col-md-12">
          <div id="chart_div" class="chart" ></div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include'includes/footer.php'; ?>
