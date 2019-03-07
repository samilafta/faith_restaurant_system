<?php
require_once "../core/init.php";


if (!isset($_SESSION['admin_uname']))   {
    redirect("../adminlogin.php");
    exit();
}

global $connect;
$sql = "SELECT COUNT(*) AS `count` FROM `menu`";
$result = $connect->query($sql);

$row = $result->fetch_assoc();
$countFood = $row['count'];

$sql = "SELECT COUNT(*) AS `count` FROM `customer`";
$result1 = $connect->query($sql);

$row = $result1->fetch_assoc();
$countCus = $row['count'];

$sql = "SELECT COUNT(*) AS `count` FROM `orders`";
$result2 = $connect->query($sql);

$row = $result2->fetch_assoc();
$countOrder = $row['count'];
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
                                        <h4 class="mb-0"><?php echo $countCus; ?></h4>
                                        <h6>Customers</h6>
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
                                        <h4 class="mb-0"><?php echo $countFood; ?></h4>
                                        <h6>Foods</h6>
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
                                        <h4 class="mb-0"><?php echo $countOrder; ?></h4>
                                        <h6>Orders</h6>
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

                <!-- ORDERS -->

                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <h6>List of Foods</h6>
                            <div class="card-actions">
                                <a href="" class="btn-minimize"><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                <a href="" class="btn-close"><small class="text-muted"><i class="fa fa-times"></i></small></a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-hover dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Code</th>
                                    <th>Customer Name</th>
                                    <th>Payment type</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Total GH¢</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM orders ORDER BY orderID DESC";
                                    $run = $connect->query($sql);
                                    $i = 1;
                                    while ($row = $run->fetch_array()) {

                                        ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['order_code']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['payment_method']; ?></td>
                                            <td><?php echo $row['delivery_address']; ?></td>
                                            <td><?php
                                                    if ($row['status'] === "pending")   {
                                                        echo "<span class='badge badge-danger'>". $row['status'] ."</span>";
                                                    }   else    {
                                                        echo "<span class='badge badge-success'>". $row['status'] ."</span>";
                                                    }

                                                ?>


                                            </td>
                                            <td>¢<?php echo $row['total_amount']; ?></td>
                                            <td>
                                                <a class="btn btn-success" title="order details" data-toggle="modal"
                                                   data-target="#detailModal<?php echo $row['orderID']; ?>">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                                <a class="btn btn-info" title="user details" data-toggle="modal" data-target="#userModal<?php echo $row['orderID']; ?>">
                                                    <i class="fa fa-user "></i>
                                                </a>
                                                <a class="btn btn-warning" data-toggle="modal" title="delivered" data-target="#deliverModal<?php echo $row['orderID']; ?>">
                                                    <i class="fa fa-shopping-cart "></i>
                                                </a>
                                                <a class="btn btn-danger" title="delete order" data-toggle="modal"
                                                   data-target="#deleteModal<?php echo $row['orderID']; ?>">
                                                    <i class="fa fa-trash-o "></i>
                                                </a>
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
                <!-- /ORDERS -->
            </div>
            <!-- /.conainer-fluid -->


            <?php
            $sql = "SELECT * FROM orders ORDER BY orderID DESC";
            $result = $connect->query($sql);
            while($row = $result->fetch_array()) {

                $orderCode = $row['order_code']
            ?>


                <!-- detail modal -->
                <div class="modal fade" id="detailModal<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-success" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-shopping-cart"></i> Order Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Date Ordered: </b> <?php echo $row['order_date']; ?></p>
                                <p><b>Order Code: </b> <?php echo $row['order_code']; ?></p>

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    global  $connect;
                                    $sql = "SELECT `orderlineID`, `trans_code`, orderline.menu_id, menu.menu_name, `quantity`, `total_price` FROM `orderline`
                                            JOIN menu ON orderline.menu_id = menu.menu_id AND orderline.trans_code = '$orderCode'";
                                    $oresults = $connect->query($sql);

                                    while ($order = $oresults->fetch_array())    {
                                        ?>
                                        <tr>
                                            <td><?php echo $order['menu_name']; ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                            <td>¢<?php echo $order['total_price']; ?></td>
                                        </tr>

                                        <?php
                                    }

                                    $sql = "SELECT SUM(total_price) AS `total` FROM `orderline` WHERE trans_code = '$orderCode'";
                                    $tresult = $connect->query($sql);
                                    while ($total = $tresult->fetch_array()) {
                                        ?>

                                        <tr>
                                            <td colspan="2" align="right"><b>Total</b></td>
                                            <td><b>¢<?php echo $total['total']; ?></b></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    }

                                    ?>

                                    </tbody>
                                </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /detail modal -->

                <!-- user modal -->
                <div class="modal fade" id="userModal<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-primary" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Customer Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $userid = $row['cus_id'];
                                $sql = "SELECT * FROM customer WHERE cus_id = '$userid'";
                                $rr = $connect->query($sql);
                                 $r = $rr->fetch_array();
                                ?>
                                <p><b>Username: </b> <?php echo $r['cus_uname']; ?></p>
                                <p><b>Full Name: </b> <?php echo $r['cus_fname']; ?></p>
                                <p><b>Email: </b> <?php echo $r['cus_email']; ?></p>
                                <p><b>Mobile #: </b> <?php echo $r['cus_tel']; ?></p>
                                <p><b>Address: </b> <?php echo $r['cus_address']; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- deliver modal -->
                <div class="modal fade" id="deliverModal<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-warning" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Confirm Delivery</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Is the order being delivered?...</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form method="post" action="validations/delivery.php">
                                    <input type="hidden" name="orderid" value="<?php echo $row['orderID'] ?>"/>
                                    <button class="btn btn-primary" name="changeDelivery">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /deliver modal -->

                <!-- delete modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Order</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Are you sure you want to delete this order? <?php echo $row['order_code']; ?></b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form method="post" action="validations/deleteorder.php">
                                    <input type="hidden" name="orderid" value="<?php echo $row['orderID']; ?>"/>
                                    <input type="hidden" name="ordercode" value="<?php echo $row['order_code']; ?>"/>
                                    <button class="btn btn-primary" name="deleteorder">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /delete modal -->

                <?php
            }

            ?>


        </main>

<?php include "includes/footer.php"; ?>

<!-- User modal -->
<div class="modal fade" id="userModal<?php echo $run['orderID']; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user"></i> User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $userid = $run['cus_id'];
                $sql = "SELECT * FROM customer WHERE cus_id = '$userid'";
                $r = $connect->query($sql);

                ?>
                <p><b>Username: </b> <?php ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
