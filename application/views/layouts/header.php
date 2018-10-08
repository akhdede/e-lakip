<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>E-Lakip BKD Kab. Bolaang Mongondow</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?= $title ?></a>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <span class="nav-link text-secondary"><span data-feather="user"></span> Welcome, <?= $_SESSION['username'] ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link text-secondary" href="<?= base_url('user/logout') ?>"><span data-feather="log-out"></span> Sign out</a>
        </li>
      </ul>
    </nav>
