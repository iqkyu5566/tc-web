<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url("admintc/home"); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
         
        </div>
        <div class="sidebar-brand-text mx-1"><?php echo $nama_aplikasi; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($judul=="Home"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url("admintc/home"); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      
 <li class="nav-item <?php if ($judul=="Users"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url("admintc/user"); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola User</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if ($judul=="Pengaturan"){echo "active";} ?>">
        <a class="nav-link" href="<?php echo base_url("admintc/pengaturan"); ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>