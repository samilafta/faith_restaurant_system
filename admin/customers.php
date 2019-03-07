<?php
require_once "../core/init.php";

if (!isset($_SESSION['admin_uname']))   {
    redirect("../adminlogin.php");
    exit();
}

?>

<?php include "includes/header.php"?>


<!-- Main content -->
<main class="main">

    <h2 class="content-header-title">Dashboard</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Customers</li>
    </ol>

    <!-- LIST OF REGISTERED CUSTOMERS -->
    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <h6>List of Customers</h6>
                    <div class="card-actions">
                        <a href=""><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                        <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                        <a href=""><small class="text-muted"><i class="fa fa-times"></i></small></a>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-striped dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact #</th>
                            <th>Date Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        global $connect;
                        $sql = "SELECT * FROM `customer`";
                        $result = $connect->query($sql);
                        $i = 1;
                        while ($row = $result->fetch_array()) {
                        $cid = $row['cus_id'];
                        $cfname = $row['cus_fname'];
                        $cuname = $row['cus_uname'];
                        $cemail = $row['cus_email'];
                        $cadd = $row['cus_address'];
                        $ctel = $row['cus_tel'];
                        $cdate = $row['date_registered'];
                        ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $cfname; ?></td>
                            <td><?php echo $cuname; ?></td>
                            <td><?php echo $cemail; ?></td>
                            <td><?php echo $cadd; ?></td>
                            <td><?php echo $ctel; ?></td>
                            <td><?php echo $cdate; ?></td>
                        </tr>

                            <?php
                            $i++;
                        }

                        $result->close();
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.conainer-fluid -->
</main>



<?php include "includes/footer.php"; ?>