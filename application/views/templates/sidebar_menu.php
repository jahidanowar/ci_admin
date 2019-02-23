<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('dashboard'); ?>">
  <div class="sidebar-brand-icon">
    <img src="<?php echo site_url('assets/img/logo.png'); ?>" alt="FoxFlue">
  </div>
  <div class="sidebar-brand-text mx-3">FoxPMS <sup>BETA</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<?php 
  //active menu 
  function active_menu($string){
    if (stripos($_SERVER['REQUEST_URI'],$string) !== false) 
    {
      echo 'active';
    }
  }
?>
<!-- Nav Item - Dashboard -->
<li class="nav-item <?php active_menu('dashboard'); ?> ">
  <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<li class="nav-item  <?php active_menu('invoice'); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice" aria-expanded="true" aria-controls="collapseInvoice">
  <i class="fas fa-file-invoice-dollar"></i>
    <span>Invoice</span>
  </a>
  <div id="collapseInvoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('invoice/add'); ?>">Add Invoice</a>
      <a class="collapse-item" href="<?php echo site_url('invoice'); ?>">View Invoice</a>
    </div>
  </div>
</li>


<li class="nav-item <?php active_menu('project'); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject" aria-expanded="true" aria-controls="collapseProject">
    <i class="fas fa-fw fa-sitemap"></i>
    <span>Projects</span>
  </a>
  <div id="collapseProject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('project/add'); ?>">Add Project</a>
      <a class="collapse-item" href="<?php echo site_url('project'); ?>">View Project</a>
    </div>
  </div>
</li>


<li class="nav-item <?php active_menu('task'); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTask" aria-expanded="true" aria-controls="collapseTask">
    <i class="fas fa-fw fa-tasks"></i>
    <span>Task</span>
  </a>
  <div id="collapseTask" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('task/add'); ?>">Add Task</a>
      <a class="collapse-item" href="<?php echo site_url('task'); ?>">View Task</a>
    </div>
  </div>
</li>


<li class="nav-item <?php active_menu('ticket'); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTickets" aria-expanded="true" aria-controls="collapseTickets">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Tickets</span>
  </a>
  <div id="collapseTickets" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('ticket/add'); ?>">Add Tickets</a>
      <a class="collapse-item" href="<?php echo site_url('ticket'); ?>">View Tickets</a>
    </div>
  </div>
</li>


<li class="nav-item <?php active_menu('user'); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-fw fa-user"></i>
    <span>User</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('user/add'); ?>">Add User</a>
      <a class="collapse-item" href="<?php echo site_url('user'); ?>">View Users</a>
    </div>
  </div>
</li>

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
  <a class="nav-link" href="tables.html">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  

  
  


