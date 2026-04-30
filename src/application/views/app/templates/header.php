<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>assets\icons\MATUIC-icon.png" type="image/png" />
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\mdi\css\materialdesignicons.min.css" />
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/croppie.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\animate.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\main.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sl-1.3.1/datatables.min.css" />

  <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mdb.min.css" media="screen,projection" /> -->

  <title>MATUIC</title>
</head>
<style>
  /* BROWSER'S SCROLL BAR */

  body::-webkit-scrollbar {
    width: 10px;
  }

  body::-webkit-scrollbar-track {
    background: #1b2126;
  }

  body::-webkit-scrollbar-thumb {
    background: #113f44;
    border-radius: 5px;
  }

  body::-webkit-scrollbar-thumb:hover {
    background: #00293b;
  }

  html {
    scrollbar-color: #113f44 #1b2126;
    scrollbar-width: thin;
  }

  .search-input {
    background: rgba(0, 0, 0, 0.4);
    border: none;
    box-shadow: none;
    /* border-radius: 30px; */
  }

  .search-input::placeholder {
    padding-left: 10px;
    color: rgba(255, 255, 255, 0.4);
  }

  .search-input:focus {
    background: rgba(0, 0, 0, 0.2);
    box-shadow: none !important;
  }

  .search-input.light {
    background: white;
    border: none;
    box-shadow: none;
    /* border-radius: 30px; */
  }

  .search-input.light::placeholder {
    padding-left: 10px;
    color: rgba(0, 0, 0, 0.4);
  }

  .search-input.light:focus {
    background: rgba(0, 0, 0, 0.1);
    box-shadow: none !important;
  }

  .search-form .search-icon {
    position: absolute;
    right: 30px;
    top: 50%;
    transform: translateY(-50%)
      /* font-size: 24px; */
  }

  .navigation {
    transition: all 0.5s ease-in-out;
  }

  .printButton {
    background: transparent;
    margin-left: 10px !important;
  }

  .transition-fade {
    transition: 0.4s;
    opacity: 1;
  }

  html.is-animating .transition-fade {
    opacity: 0;
  }
</style>

<body>