<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>
<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-default border-0" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header text-left d-flex align-items-center" style="background: #11213a;">
        <span class="mr-2 ml-4">
          <img src="<?php echo site_url(); ?>assets\images\logo\logo-minimal.png" class="navbar-brand-img" alt="...">
        </span>
        <span class="font-weight-bold" style="font-size: 20px;">NKONNY.COM</span>
      </div>
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- <div class="d-flex align-items-center mb-3 bg-default py-3 pl-3">
        <div class="nav-profile-image">
          <img src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['user_pic']; ?>" alt="profile"  style="height: 50px;">
        </div>
        <div class="d-flex flex-column ml-4 ">
            <span class="text-small text-white-50" style="font-size: 16px;"><?php echo $user['name']; ?></span>
            <span class="text-small" style="font-size: 12px;"><?php echo $user['role']; ?></span>
        </div>
      </div> -->
      <div class="navbar-inner">
        <!-- Collapse -->
        
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white <?php if ($uri2 == 'dashboard') {echo 'active';}; ?>" href="<?php echo base_url(); ?>admin/dashboard">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Manage</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link text-white <?php if ($uri2 == 'women-collection') {echo 'active';}; ?>" href="<?php echo base_url(); ?>admin/women-collection">
                <i class="fa fa-female text-purple"></i>
                <span class="nav-link-text">Women collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white <?php if ($uri2 == 'men-collection') {echo 'active';}; ?>" href="<?php echo base_url(); ?>admin/men-collection">
                <i class="fa fa-male text-info"></i>
                <span class="nav-link-text">Men collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white <?php if ($uri2 == 'kids-collection') {echo 'active';}; ?>" href="<?php echo base_url(); ?>admin/kids-collection">
                <i class="fa fa-baby text-orange"></i>
                <span class="nav-link-text">Kids collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white <?php if ($uri2 == 'home-design') {echo 'active';}; ?>" href="<?php echo base_url(); ?>admin/home-design">
                <i class="ni ni-building text-green"></i>
                <span class="nav-link-text">Home design</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Site navigation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>">
                <i class="fa fa-home text-blue"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>collections/women-collection">
                <i class="ni ni-curved-next text-purple"></i>
                <span class="nav-link-text">Women collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>collections/men-collection">
                <i class="ni ni-curved-next text-info"></i>
                <span class="nav-link-text">Men collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>collections/kids-collection">
                <i class="ni ni-curved-next text-orange"></i>
                <span class="nav-link-text">Kids collection</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>home-design">
                <i class="ni ni-curved-next text-green"></i>
                <span class="nav-link-text">Home design</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>