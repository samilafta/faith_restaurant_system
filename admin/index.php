<?php
require_once "../core/init.php";


global $connect;
$sql = "SELECT COUNT(*) AS `count` FROM `staff`";
$result = $connect->query($sql);

$row = $result->fetch_assoc();
$count_staff = $row['count'];

$sql = "SELECT COUNT(*) AS `count` FROM `users`";
$result1 = $connect->query($sql);

$row = $result1->fetch_assoc();
$count_users = $row['count'];

$sql = "SELECT COUNT(*) AS `count` FROM `bookings`";
$result2 = $connect->query($sql);

$row = $result2->fetch_assoc();
$count_bookings = $row['count'];
?>

<?php include "includes/header.php"?>


        <!-- Main content -->
        <main class="main">

            <h2 class="content-header-title">Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <div class="container-fluid">

                <!-- SITE INFO SUMMARY -->
                <div class="info animate fadeIn">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-inverse card-primary">
                                <div class="card-block pb0">
                                    <div class="col-sm-6 pull-left">
                                        <h4 class="mb-0"><?php echo $count_staff; ?></h4>
                                        <h6>Staffs</h6>
                                    </div>
                                    <div class="col-sm-6 pull-right">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-inverse card-warning">
                                <div class="card-block pb0">
                                    <div class="col-sm-6 pull-left">
                                        <h4 class="mb-0"><?php echo $count_users; ?></h4>
                                        <h6>Customers</h6>
                                    </div>
                                    <div class="col-sm-6 pull-right">
                                        <i class="fa fa-cutlery fa-5x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-inverse card-danger">
                                <div class="card-block pb0">
                                    <div class="col-sm-6 pull-left">
                                        <h4 class="mb-0"><?php echo $count_bookings; ?></h4>
                                        <h6>Requests</h6>
                                    </div>
                                    <div class="col-sm-6 pull-right">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /SITE INFO SUMMARY -->

                
            </div>
            <!-- /.conainer-fluid -->

        </main>

<?php include "includes/footer.php"; ?>


