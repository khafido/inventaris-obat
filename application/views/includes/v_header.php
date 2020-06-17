<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inventaris Obat</title>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/print.dataTables.min.css'?>">

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/print.min.js' ?>"></script>

  <script type="text/javascript" src="<?=base_url()?>assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/buttons.html5.min.js"></script>

  <style>
  body{
    background: #E9EAEB;
  }
  .form-group > label{
    font-weight: bold;
    /*color: white;*/
  }

  .nav-item a{
    color: white;
  }

  tr th{
    font-weight: normal;
  }

  a{
    cursor: pointer;
  }

  /* Dropdown Button */
  .dropbtn {
    /* background-color: #4CAF50; */
    color: white;
    padding: 7px 10px;
    /* padding: 16px; */
    font-size: 16px;
    border: none;
  }

  /* The container <div> - needed to position the dropdown content */
  /* .dropdown {
    position: relative;
    display: inline-block;
  } */

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    margin-top: 40px;
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {background-color: #ddd;}

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {display: block;}

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    /* background-color: #3e8e41; */
    color: white;
    text-decoration: none;
  }

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md fixed-top mb-3" style="background: #1F5877;">
    <div class="container">
      <a class="navbar-brand text-white" href="/inventaris-obat">Inventaris Obat</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Daftar Obat <span class="sr-only">(current)</span></a>
        </li> -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="#">Laporan</a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Obat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/ada">Obat Tersedia</a>
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/kedaluwarsa">Obat Kedaluwarsa</a>
        </div>
      </li> -->
      <li class="nav item dropdown">
        <a href="#" class="dropbtn">Obat&ensp;<i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/ada">Obat Tersedia</a>
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/kedaluwarsa">Obat Kedaluwarsa</a>
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/statis">Obat Statis</a>
          <a class="dropdown-item text-dark" href="<?=base_url()?>obat/keluar">Obat Keluar</a>
        </div>
      </li>
      <li class="nav item dropdown">
        <a href="#" class="dropbtn">Rekam Medis&ensp;<i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a class="dropdown-item text-dark" href="<?=base_url()?>rekam">Daftar Rekam Medis</a>
          <a class="dropdown-item text-dark" href="<?=base_url()?>rekam/keluar">Detail Obat Keluar</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>pegawai">Pegawai</a>
      </li>
      <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Laporan
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item text-dark" href="/obat/laporan/ada" target="_blank">Obat Tersedia</a>
    <a class="dropdown-item text-dark" href="/obat/laporan/kedaluwarsa" target="_blank">Obat Kedaluwarsa</a>
  </div>
</li> -->
<!-- <li class="nav-item">
<a class="nav-link disabled" href="#">Disabled</a>
</li> -->
</ul>

<ul class="nav navbar-nav navbar-right">
  <img src="<?=base_url("assets/images/")?>logo1.png" alt="" style="width:110px; height:80px;">
  <label class="text-center" style="color:white;">Badan Pemeriksa Keuangan<br/>Perwakilan Provinsi <br/>Nusa Tenggara Barat</label>
</ul>
<!-- <form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form> -->
</div>
</div>
</nav>
<div class="col-md-12" style="padding-top:140px;"></div>
