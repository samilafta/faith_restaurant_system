<?php
require_once "../core/init.php";


if (!isset($_SESSION['email']))   {
    redirect("../index.php");
    exit();
}

global $connect;

?>

<?php include "includes/header.php"?>


        <!-- Main content -->
        <main class="main">

            <h2 class="content-header-title">Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Bookings</li>
            </ol>


            <div class="container-fluid">

                <!-- BOOKINGS -->

                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <h6>Requests</h6>
                            <div class="card-actions">
                                <a href="" class="btn-minimize"><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                <a href="" class="btn-close"><small class="text-muted"><i class="fa fa-times"></i></small></a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Type</th>
                                    <th>Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>User</th>
                                    <th>Staff</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM `bookings` JOIN users ON bookings.user_id = users.id JOIN staff ON bookings.staff_id = staff.staffID ORDER BY bookings.created_at DESC";
                                    $run = $connect->query($sql);
                                    $i = 1;
                                    while ($row = $run->fetch_array()) {

                                        ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['service_type']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['latitude']; ?></td>
                                            <td><?php echo $row['longitude']; ?></td>
                                            <td><?php echo $row['firstname']. " ".$row['lastname'] ; ?></td>
                                            <!-- <td><?php //echo $row['full_name']; ?></td> -->
                                             <td><?php
                                                    if ($row['staff_id'] == 1)   {
                                                        echo "<span class='badge badge-danger'>not assigned yet</span>";
                                                    }   else    {
                                                        echo $row['full_name'];;
                                                    }

                                                ?>

                                            </td>
                                            <td><?php
                                                    if ($row['status'] == 0)   {
                                                        echo "<span class='badge badge-danger'>pending</span>";
                                                    }
                                                    elseif ($row['status'] == 1) {
                                                           echo "<span class='badge badge-primary'>assigned</span>";
                                                       } 
                                                    elseif ($row['status'] == 3) {
                                                           echo "<span class='badge badge-danger'>cancelled</span>";
                                                       }   
                                                    else    {
                                                        echo "<span class='badge badge-success'>success</span>";
                                                    }

                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['status'] != 3)   {
                                                        ?>
                                                            <a class="btn btn-success" title="view location" data-toggle="modal"
                                                               data-target="#detailModal<?php echo $row['book_id']; ?>" data-lat="<?php echo $row['latitude']; ?>" data-lng="<?php echo $row['longitude']; ?>">
                                                                <i class="fa fa-search-plus"></i>
                                                            </a>
                                                            <a class="btn btn-info" title="user details" data-toggle="modal" data-target="#userModal<?php echo $row['book_id']; ?>">
                                                                <i class="fa fa-user "></i>
                                                            </a>
                                                            <a class="btn btn-warning" data-toggle="modal" title="assign staff" data-target="#deliverModal<?php echo $row['book_id']; ?>">
                                                                <i class="fa fa-code-fork"></i>
                                                            </a>
                                                            <a href="validations/delivery.php?book=<?php echo $row['book_id']; ?>" class="btn btn-danger" title="Cancel Request"> Cancel Request
                                                                <i class="fa fa-ban "></i>
                                                            </a>

                                                        <?php
                                                    }

                                                ?>

                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                        ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.conainer-fluid -->

            <?php include "includes/modal.php"; ?> 

        </main>




<?php include "includes/footer.php"; ?>
                                   