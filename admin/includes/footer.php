

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/datepicker/js/datepicker.js"></script>

<script type="text/javascript">

var dateToday = new Date();
    setTimeout(function(){
      $('.msg').fadeOut('slow');
    },1500);

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2();

      $( "#datepicker" ).datepicker({
          numberOfMonths: 1,
          showButtonPanel: false,
          minDate: dateToday
      });
    });

</script>

</body>
</html>
