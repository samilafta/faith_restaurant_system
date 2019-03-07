<?php
require_once "../core/init.php";

if (!isset($_SESSION['username']))   {
    redirect("../login.php");
    exit();
}

?>

<?php include "includes/header.inc.php"; ?>

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
                <h1>Checkout</h1>
                <p>Fill the form below for to make final order</p>
            </div>	<!-- End of /.col-md-4 -->
            <div class="col-md-8 hidden-xs">
                <ol class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Checkout</li>
                </ol>
            </div>	<!-- End of /.col-md-8 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->






<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-5 clearfix">

                <div class="block">
                    <h4><i class="fa fa-shopping-cart"></i> Your Order </h4>
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
                        $code = $_SESSION['usercode'];
                        $sql = "SELECT `orderlineID`, `trans_code`, orderline.menu_id, menu.menu_name, `quantity`, `total_price` FROM `orderline`
                                JOIN menu ON orderline.menu_id = menu.menu_id AND orderline.trans_code = '$code'";
                        $result = $connect->query($sql);

                            while ($row = $result->fetch_array())    {
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
                            $sql = "SELECT SUM(total_price) AS `total` FROM `orderline` WHERE trans_code = '$code'";
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
                    <div class="orderButton">
                        <a href="validations/cancelorder.php" class="btn btn-danger btn-lg btn-block">Cancel Order</a>
                    </div>
                </div>


            </div>


            <!-- check out form begins -->
            <div class="col-md-6">
                <?php
                $result1 = $connect->query($sql);
                $run1 = $result1->fetch_array();
                ?>

                <form method="post" action="validations/checkout.php">
                    <h4>Fill the form below</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" name="name" value="<?php echo $_SESSION['fullname']; ?>" required/>
                                <input type="hidden" name="userid" value="<?php echo $_SESSION['userID']; ?>" />
                                <input type="hidden" name="totalamount" value="<?php echo $run1['total']; ?>" />
                                <input type="hidden"  name="ordercode" value="<?php echo $code; ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Delivery Address</label>
                                <input id="address" class="form-control" name="address" title="You can input ghana post code" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Payment Method</label>
                                <select id="category" name="paymentm" class="form-control">
                                    <option value="Cash on delivery">Cash on delivery</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="notes">Notes for the restaurant</label>
                            <textarea rows="4" cols="50" id="notes" class="form-control" name="notes" placeholder="Eg. allergies, cash change, additional information"></textarea>
                        </div>
                    </div> <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <button name="checkout" class="btn btn-success btn-lg btn-block">
                                <i class="fa fa-check"></i> Confirm Order
                            </button>
                        </div>
                    </div>

                </form>
            </div>


            </div>
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section> <!-- End of /.Section -->



