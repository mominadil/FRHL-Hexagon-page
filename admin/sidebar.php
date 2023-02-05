 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
       <li class="nav-item">
           <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
           <a href="index.php" class="nav-link">Home</a>
       </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">

       <!-- Navbar Search -->
       <li class="nav-item">
           <a class="nav-link" data-widget="navbar-search" href="#" role="button">
               <i class="fas fa-search"></i>
           </a>
           <div class="navbar-search-block">
               <form class="form-inline">
                   <div class="input-group input-group-sm">
                       <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                       <div class="input-group-append">
                           <button class="btn btn-navbar" type="submit">
                               <i class="fas fa-search"></i>
                           </button>
                           <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                               <i class="fas fa-times"></i>
                           </button>
                       </div>
                   </div>
               </form>
           </div>
       </li>

       <!-- Messages Dropdown Menu -->

       <!-- Notifications Dropdown Menu -->


       <li class="nav-item">
           <a class="nav-link" data-widget="fullscreen" href="#" role="button">
               <i class="fas fa-expand-arrows-alt"></i>
           </a>
       </li>

       <li class="nav-item">
           <a href="../login/logout.php" class="nav-link">
               logout
               <i class="fas fa-sign-out" aria-hidden="true"></i>
           </a>
       </li>
   </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->


   <!-- Sidebar -->
   <div class="sidebar">
       <!-- Sidebar user (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <div style="padding-left: 1.8rem;" class="image">
               <img style="width: 100%;" src="../images/fomento.png" alt="User Image">
           </div>
             <!-- <div class="info">
                 <a href="#" class="d-block">Makemelive</a>
             </div> -->
         </div>
         <!-- SidebarSearch Form -->
         <div class="form-inline">
           <div class="input-group" data-widget="sidebar-search">
               <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
               <div class="input-group-append">
                   <button class="btn btn-sidebar">
                       <i class="fas fa-search fa-fw"></i>
                   </button>
               </div>
           </div>
       </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent " data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                     <li class="nav-item">
                       <a href="index.php" class="nav-link <?php if ($selected == "index") print $current_id; ?>">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                               Dashboard
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="m_category.php" class="nav-link  <?php if ($selected == "m_category") print $current_id; ?>">
                           <i class="far fa-list-alt nav-icon"></i>
                           <p>Manage Master Category</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="notice.php" class="nav-link  <?php if ($selected == "notice") print $current_id; ?>">
                           <i class="far fa-bell nav-icon"></i>
                           <p>Manage Notices </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="year_details.php" class="nav-link  <?php if ($selected == "year_details") print $current_id; ?>">
                           <i class="far fa-calendar nav-icon"></i>
                           <p>Manage Year Details</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="category.php" class="nav-link  <?php if ($selected == "category") print $current_id; ?>">
                           <i class="far fa-file-pdf-o nav-icon"></i>
                           <p>Manage PDF Details</p>
                       </a>
                   </li>
               </ul>
           </li>
       </nav>
       <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>