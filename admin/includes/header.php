<?php

if (!isset($_SESSION['email']))   {
    redirect("../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Admin</title>

    <!-- Icons -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="assets/css/glyphicons.css" rel="stylesheet">
    <link href="assets/css/glyphicons-filetypes.css" rel="stylesheet">
    <link href="assets/css/glyphicons-social.css" rel="stylesheet">

    <link href="assets/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<!-- TOP NAVIGATION BAR -->
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav hidden-md-down">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <b><i class="fa fa-user"></i>
                <span class="hidden-md-down"><?php echo  $_SESSION['full_name']; ?></span></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../adminlogout.php"><i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>

    </ul>
</header>
<!-- /TOP NAVIGATION BAR -->

<div class="app-body">

    <!-- SIDEBAR NAVIGATION -->
    <div class="sidebar">

        <nav class="sidebar-nav">
            <ul class="nav">
                <?php 
                    if($_SESSION['level'] == "admin"){
                        ?>
                            <li class="nav-title">Dashboard</li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><i class="fa fa-dashboard"></i> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="bookings.php"><i class="fa fa-bookmark"></i> Bookings </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="customers.php"><i class="fa fa-users"></i> Customers </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="staff.php"><i class="fa fa-user"></i> Staff </a>
                            </li>
                        <?php
                    } else{
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="requests.php"><i class="fa fa-clipboard"></i> Requests </a>
                            </li>

                        <?php
                    }

                 ?>
                
                 <!-- <li class="nav-item">
                    <a class="nav-link" href="reports.php"><i class="fa fa-clipboard"></i> Reports </a>
                </li> -->

            </ul>
        </nav>
    </div>
    <!-- SIDEBAR NAVIGATION -->
