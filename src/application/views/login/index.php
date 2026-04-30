  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-white py-7 py-lg-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <!-- <h1 class="text-white">Bienvenu!</h1> -->
              <div>
                <img src="<?php echo site_url(); ?>assets/images/logo/MATUIC-logo-1.png" height="150" alt="logo">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-white border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-white mb-4 mb-5">
                <h2 class="text-default">Se connecter</h2>
              </div>

              <?php if ($this->session->flashdata('login_failed')) : ?>
                <?php echo '<p class="text-danger animated fadeInUp">' . $this->session->flashdata('login_failed') . '</p>'; ?>
              <?php endif; ?>

              <?php echo form_open('user/login'); ?>                
                <?php echo form_error('username', '<small class="text-danger mb-2 animated fadeInUp">', '</small>'); ?>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Identifiant" type="text" name="username" required>
                  </div>
                </div>

                <div class="form-group">
                <?php echo form_error('password', '<small class="text-danger mb-2 animated fadeInUp">', '</small>'); ?>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Mot de passe" type="password" name="password" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-default my-4">Connexion</button>
                </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>