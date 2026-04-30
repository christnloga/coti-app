<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-default border-0" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header text-left text-white d-flex align-items-center">
      <!-- <span class="ml-3"><img src="<?php echo site_url(); ?>assets/images/logo/MATUIC-logo-2-white.png" height="30" alt="logo"></span> -->
      <span class="font-weight-bold text-muted mt-3 ml-3" style="font-size: 35px; letter-spacing: 8px;">-MATUIC-</span>
    </div>
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">

      <!-- User -->
      <div class="d-flex align-items-center mb-3 py-3 pl-3 bg-translucent-dark">
        <div class="avatar rounded-circle overflow-hidden">
          <img src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['photo']; ?>" alt="profile">
        </div>
        <div class="d-flex flex-column ml-4 ">
          <span class="text-small text-white-50" style="font-size: 16px;"><?php echo $user['username']; ?></span>
          <span class="text-small" style="font-size: 12px;"><?php echo $user['role']; ?></span>
        </div>
      </div>

      <!-- Search -->
      <?php if ($user['role'] == 'administrateur') : ?>
        <div class="search-form position-relative px-2 py-3">
          <input class="form-control search-input" type="text" name="search_input" placeholder="Rechercher...">
          <span class="search-icon"><i class="fa fa-search"></i></span>
        </div>
        <div class="search-result px-2 mb-2"></div>
      <?php endif; ?>

      <!-- Navigation Area -->
      <div class="navbar-inner">
        <!-- Collapse -->

        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3 navigation" id="navigation">
          <li class="nav-item mb-3">
            <a class="nav-link text-white-50 <?php if ($uri == 'monespace') {
                                                echo 'active';
                                              }; ?>" href="<?php echo base_url(); ?>monespace">
              <i class="fa fa-chart-bar text-green"></i>
              <span class="nav-link-text">Résumé</span>
            </a>
          </li>
          <?php if ($user['role'] == 'administrateur') : ?>
            <li class="nav-item mb-2">
              <a class="nav-link text-white-50 <?php if ($uri == 'membres') {
                                                  echo 'active';
                                                }; ?>" href="<?php echo base_url(); ?>membres">
                <i class="fa fa-users text-orange"></i>
                <span class="nav-link-text">Membres</span>
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link text-white-50 <?php if ($uri == 'tontines') {
                                                  echo 'active';
                                                }; ?>" href="<?php echo base_url(); ?>tontines">
                <i class="fa fa-comments-dollar text-purple"></i>
                <span class="nav-link-text">Tontines</span>
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link text-white-50 <?php if ($uri == 'caisses') {
                                                  echo 'active';
                                                }; ?>" href="<?php echo base_url(); ?>caisses">
                <i class="fa fa-wallet text-white"></i>
                <span class="nav-link-text">Caisses</span>
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link text-white-50 <?php if ($uri == 'credits') {
                                                  echo 'active';
                                                }; ?>" href="<?php echo base_url(); ?>credits">
                <i class="fa fa-coins text-yellow"></i>
                <span class="nav-link-text">Crédits</span>
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link text-white-50 <?php if ($uri == 'aides') {
                                                  echo 'active';
                                                }; ?>" href="<?php echo base_url(); ?>aides">
                <i class="fa fa-hand-holding-usd text-red"></i>
                <span class="nav-link-text">Gestion d'aide</span>
              </a>
            </li>
            <li class="nav-item mb-2 accordion d-none" id="accordionExample">
              <a class="nav-link text-white-50" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-coins text-yellow"></i>
                <span class="nav-link-text">Test</span>
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <ul class="navbar-nav mb-md-3 navigation" id="navigation">
                  <li class="nav-item mb-2">
                    <a class="nav-link text-white-50 pl-5" href="#">
                      <i class="fa fa-user text-teal"></i>
                      <span class="nav-link-text">Link 1</span>
                    </a>
                    <a class="nav-link text-white-50 pl-5" href="#">
                      <i class="fa fa-user text-teal"></i>
                      <span class="nav-link-text">Link 2</span>
                    </a>
                    <a class="nav-link text-white-50 pl-5" href="#">
                      <i class="fa fa-user text-teal"></i>
                      <span class="nav-link-text">Link 3</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <li class="nav-item mb-2">
            <a class="nav-link text-white-50 <?php if ($uri == 'profile') {
                                                echo 'active';
                                              }; ?>" href="<?php echo base_url(); ?>profile">
              <i class="fa fa-user text-teal"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>