<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-danger">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link text-center">

    <span class="brand-text font-weight-bold">Live Restaurant</span>
  </a>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard" class="nav-link <?= ($activePage == 'dashboard') ? 'active':''; ?> ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= ($activePage == 'regular-menu-details' || $activePage == 'offered-menu-details'||$activePage == 'add-regular-item' || $activePage == 'add-offered-item' ) ? 'menu-open':''; ?>">
          <a  class="nav-link <?= ($activePage == 'regular-menu-details' || $activePage == 'offered-menu-details'||$activePage == 'add-regular-item' || $activePage == 'add-offered-item') ? 'active':''; ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Menu Details
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
            <li class="nav-item">
              <a href="add-regular-item" class="nav-link <?= ($activePage == 'add-regular-item') ? 'active':''; ?> ">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Add New Regular Item
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="regular-menu-details" class="nav-link <?= ($activePage == 'regular-menu-details') ? 'active':''; ?> ">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  All Regular Items
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add-offered-item" class="nav-link <?= ($activePage == 'add-offered-item') ? 'active':''; ?> ">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Add New Offered Item
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="offered-menu-details" class="nav-link <?= ($activePage == 'offered-menu-details') ? 'active':''; ?> ">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  All Offered Items
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="reservations" class="nav-link <?= ($activePage == 'reservations') ? 'active':''; ?> ">
            <i class="nav-icon far fa-copy"></i>
            <p>
                Reservations
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="contact-us-messages" class="nav-link <?= ($activePage == 'contact-us-messages') ? 'active':''; ?> ">
            <i class="nav-icon far fa-envelope"></i>
            <p>
                Contact Mail-Box
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
