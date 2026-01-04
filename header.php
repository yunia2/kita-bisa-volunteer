<?php
if(!isset($title)) $title = "Volunteer System";
$transparent = isset($use_transparent) && $use_transparent == true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <!-- FIX: path CSS benar -->
  <link rel="stylesheet" href="assets/css/style_dashboard.css">
</head>

<body>

<!-- NAVBAR -->
<header class="navbar <?= $transparent ? 'navbar-transparent' : 'navbar-solid' ?>">
  <div class="nav-brand">Volunteer</div>
  <nav class="nav-links">
      <a href="admin_dashboard.php">Dashboard</a>
      <a href="logout.php">Logout</a>
  </nav>
</header>

<!-- START PAGE CONTENT -->
<div class="page-content">
