<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" >
          <i class="fas fa-user"></i> <b><?php echo $_SESSION['name']; ?></b>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
        <i class="fas fa-sign-out-alt"></i> <b>Sign-Out</b>
      </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
