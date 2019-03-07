<?php
require_once "../core/init.php";

if (!isset($_SESSION['username']))   {
    redirect("../login.php");
    exit();
}


?>

<?php
include "includes/header.inc.php";
?>

<!-- MENU Start
================================================== -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div> <!-- End of /.navbar-header -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li ><a href="index.php">HOME</a></li>
                <li ><a href="menu.php">Menu</a></li>
                <li class="active"><a href="orders.php">Your Orders</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>



<!-- Breadcrumbs Start
    ================================================== -->

<section id="topic-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Your Orders</h1>
                <p>Use the order code for verification.</p>
            </div>	<!-- End of /.col-md-4 -->
            <div class="col-md-8 hidden-xs">
                <ol class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Your orders</li>
                </ol>
            </div>	<!-- End of /.col-md-8 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->






<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <table class="table table-hover dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Payment type</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Total GH¢</th>
                        <th>Date Ordered</th>
                        <th>Order Details</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    global $connect;
                    $userid = $_SESSION['userID'];
                    $sql = "SELECT * FROM orders WHERE cus_id = '$userid' ORDER BY orderID DESC";
                    $result = $connect->query($sql);
                    if ($result->num_rows == 0) {
                        echo "No Orders Placed yet.";
                    }   else {
                        $i = 1;
                        while ($row = $result->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['order_code']; ?></td>
                                <td><?php echo $row['payment_method']; ?></td>
                                <td><?php echo $row['delivery_address']; ?></td>
                                <td><?php
                                    if ($row['status'] === "pending") {
                                        echo "<span class='label label-danger'>" . $row['status'] . "</span>";
                                    } else {
                                        echo "<span class='label label-success'>" . $row['status'] . "</span>";
                                    }

                                    ?>
                                </td>
                                <td>¢<?php echo $row['total_amount']; ?></td>
                                <td><?php echo $row['order_date']; ?></td>
                                <td>
                                    <a class="btn btn-success" data-toggle="modal"
                                       data-target="#detailModal<?php echo $row['orderID']; ?>">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    $result->close();
                ?>
                    </tbody>
                </table>
            </div>	<!-- End of /.col-md-9 -->
        </div>	<!-- End of /.row -->


        <?php
        $sql = "SELECT * FROM orders WHERE cus_id = '$userid' ORDER BY orderID DESC";
        $result1 = $connect->query($sql);
        while($run = $result1->fetch_array()) {
            $orderCode = $run['order_code']
        ?>

        <!-- detail modal -->
        <div class="modal fade" id="detailModal<?php echo $run['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-success" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Order Details</h4>
                    </div>
                    <div class="modal-body">
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
                            $result2 = $connect->query($sql);

                            while ($row = $result2->fetch_array())    {
                                ?>
                                <tr>
                                    <td><?php echo $row['menu_name']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td>¢<?php echo $row['total_price']; ?></td>
                                </tr>

                                <?php
                            }
                            ?>

                            <?php
                            $sql = "SELECT SUM(total_price) AS `total` FROM `orderline` WHERE trans_code = '$orderCode'";
                            $run = $connect->query($sql);
                            while ($result = $run->fetch_array()) {
                                ?>

                                <tr>
                                    <td colspan="2" align="right"><b>Total</b></td>
                                    <td><b>¢<?php echo $result['total']; ?></b></td>
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
        <?php
        }
        $connect->close();
        ?>

    </div>	<!-- End of /.container -->
</section> <!-- End of /.Section -->



<!-- FOOTER Start
================================================== -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block clearfix">
                    <a href="#">
                        <img src="images/footer-logo.png" alt="">
                    </a>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                    <h4 class="connect-heading">CONNECT WITH US</h4>
                    <ul class="social-icon">
                        <li>
                            <a class="facebook-icon" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="plus-icon" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a class="twitter-icon" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="pinterest-icon" href="#">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a class="linkedin-icon" href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>	<!-- End Of /.social-icon -->
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of /.Col-md-4 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>GET IN TOUCH</h4>
                    <p ><i class="fa  fa-map-marker"></i> <span>Food Code d.o.o.,</span>1000 Ljubljana Celovska cesta 135, Slovenia</p>
                    <p> <i class="fa  fa-phone"></i> <span>Phone:</span> (+386) 40 123 456 </p>

                    <p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> (+386) 40 654 123 651</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>info@sitename.com</span></p>
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
        </div> <!-- End Of /.row -->
    </div> <!-- End Of /.Container -->



    <!-- FOOTER-BOTTOM Start
    ================================================== -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright-text text-center">Faith Restaurant @2018 Designed by <a href="http://www.themexpert.com">Group 5</a> All Rights Reserved</p>
                </div>	<!-- End Of /.col-md-12 -->
            </div>	<!-- End Of /.row -->
        </div>	<!-- End Of /.container -->
    </div>	<!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>
</body>
</html>
