  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand bg-white border-bottom" style="height: 60px;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-sm-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <i class="fas fa-caret-down mr-2"></i>
                  <span class="avatar avatar-sm rounded-circle overflow-hidden">
                    <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['photo']; ?>">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-bold"><?php echo $user['username']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <!-- <a href="<?php echo base_url(); ?>admin/settings" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Paramètres</span>
                </a>
                <div class="dropdown-divider"></div> -->
                <a href="<?php echo base_url(); ?>user/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Déconnexion</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Toast natifcations -->
    <div class="bg-success position-absolute py-3 px-3 rounded" id="deleteSuccessToast" style="z-index: 1111; top: 80px; right: 50px; display: none;">
      <span class="text-white"><i class="fa fa-check mr-3"></i>Deleted successfully</span>
    </div>
    <div class="inner transition-fade" id="swup">