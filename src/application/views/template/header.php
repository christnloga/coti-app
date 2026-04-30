<html>
<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mdb.min.css"/>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightslider.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\mdi\css\materialdesignicons.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\main.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\animate.min.css" />
  <link rel="icon" href="<?php echo base_url(); ?>assets\Icons\Logo-minimal-sm.png" />

  <title>
    <?= $title; ?> | ALTECHS ING
    <?php if ($uri == '') {
      echo ' || Des services plus sûrs';
    }; ?>
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg mainNav fixed-top" id="mainNav" style="box-shadow:none;">

    <div class="container">
      <a href="<?php echo base_url() ?>" class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url(); ?>assets\images\logo\Logo-minimal-sm.png" style="max-width: 40px;" alt="">
        <span class="text-white" style="font-size: 20px;">ALTECHS ING</span>
      </a>
      <button class="navbar-toggler navbar-toggler-right collapsed ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">    
        <i class="fas fa-bars fa-lg"></i>
      </button>
      <div class="navbar-collapse collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger <?php if ($uri == 'about') {
                                                    echo 'active';
                                                  }; ?>" href="#about">Qui sommes nous ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger <?php if ($uri == 'services') {
                                                    echo 'active';
                                                  }; ?>" href="<?php echo base_url() ?>services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger <?php if ($uri == 'portfolio') {
                                                    echo 'active';
                                                  }; ?>" href="<?php echo base_url() ?>portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger <?php if ($uri == 'notre Equipe') {
                                                    echo 'active';
                                                  }; ?>" href="#team">Notre Equipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger <?php if ($uri == 'contact') {
                                                    echo 'active';
                                                  }; ?>" href="#contact">Contact</a>
          </li>
          <?php if ($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
              <a class="btn dolly-light-pink text-dolly-pink btn-sm rounded" style="margin-top: 12px;" roll="btn" href="<?php echo base_url(); ?>admin/dashboard">Dashboard
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>