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
  <link rel="icon" href="<?php echo base_url(); ?>assets\Icons\logo-minimal.png" />

  <title>
    <?= $Title; ?> | Altechs Engineering
    <?php if ($uri == '' || $uri == 'home') {
      echo ' - A small description here';
    }; ?>
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg topBar <?php if ($uri == '' || $uri == 'home') {
                                                echo '';
                                              }; ?> fixed-top white" style="box-shadow:none;">
    <div class="container">

        <ul class="navbar-nav">
          <li class="nav-item my-auto">
            <a class="mx-1" data-toggle="tooltip" title="Nous sommes situés à..." style="font-size: 12px;">
                <i class="fa fa-map-marker fa-lg text-success"></i>
                <span class="text-dark ml-2 text-capitalize">Yaoundé, Cameroun</span>
            </a>
            
          </li>
          <li class="nav-item my-auto mx-4">
            <a href="callto:+237697789366" class="mx-1" data-toggle="tooltip" title="Appeler" style="font-size: 12px;">
                <i class="fa fa-phone fa-lg text-success"></i>
                <span class="text-dark ml-2">(+237) 222 218 458</span>
            </a>
            
          </li>
          <li class="nav-item my-auto">
            <a href="mailto:contact@dollyderm.com" class="mx-1" data-toggle="tooltip" title="Envoyez-nous un mail" style="font-size: 12px;">
                <i class="fa fa-envelope fa-lg text-success"></i>
                <span class="text-dark ml-2 text-lowercase">info@altechs.africa</span>
            </a>
            
          </li>
        </ul>

        <ul class="navbar-nav ml-auto" style="transform: scale(0.8)">
          <li class="nav-item">
            <a class="btn-floating btn-sm red mx-1" style="box-shadow: none;">
                <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="btn-floating btn-sm blue mx-1" style="box-shadow: none;">
                <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="btn-floating btn-sm cyan mx-1" style="box-shadow: none;">
                <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="btn-floating btn-sm light-blue mx-1" style="box-shadow: none;">
                <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        </ul>

    </div>
  </nav>