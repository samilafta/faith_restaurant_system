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
                    <li><a href="index.php">HOME</a></li>
                    <li class="active"><a href="menu.php">Menu</a></li>
                    <li><a href="orders.php">Your Orders</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul> <!-- End of /.nav-main -->
            </div>	<!-- /.navbar-collapse -->
        </div>	<!-- /.container-fluid -->
    </nav>	<!-- End of /.nav -->




    <section id="topic-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Menu</h1>
                    <p>List of available foods. Make your order.</p>
                </div>	<!-- End of /.col-md-4 -->
                <div class="col-md-8 hidden-xs">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Menu</li>
                    </ol>
                </div>	<!-- End of /.col-md-8 -->
            </div>	<!-- End of /.row -->
        </div>	<!-- End of /.container -->
    </section>	<!-- End of /#Topic-header -->



<!-- PRODUCTS Start
================================================== -->

    <section id="shop">
        <div class="container-fluid" style="margin: 0 20px;">
            <div class="row">
                <div class="col-md-9">
                    <div class="products-heading">
                        <h2>Lunch</h2>
                    </div>	<!-- End of /.Products-heading -->
                    <div class="product-grid">

                            <?php

                            global $connect;
                            $sql = "SELECT * FROM menu";
                            $result = $connect->query($sql);
                            if ($result->num_rows < 1)   {
                                echo "<h3>No items available.</h3>";
                            }   else {
                                $i = 1;
                                while ($row = $result->fetch_array()) {
                                    $mid = $row['menu_id'];
                                    $mname = $row['menu_name'];
                                    $mimage = $row['menu_img'];
                                    $mprice = $row['menu_price'];

                                    ?>


                                    <div class="col-md-3">
                                        <div class="products">
                                            <a>
                                                <img src="../admin/uploads/<?php echo $mimage; ?>" alt="">
                                            </a>
                                            <a>
                                                <h6><?php echo $mname; ?></h6>
                                            </a>

                                            <form method="post" action="validations/additem.php">
                                                <input type="number" name="qty" value="1" min="1" max="100" class="form-control"/>
                                                <input type="hidden" name="mid" value="<?php echo $mid; ?>"/>
                                                <input type="hidden" name="price" value="<?php echo $mprice; ?>"/>
                                                <input type="hidden" name="usercode" value="<?php echo $_SESSION['usercode'] ?>"/>
                                                <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>"/>
                                                <p class="price">¢<?php echo $mprice; ?></p>

                                                <button class="btn btn-success btn-block" name="additem">
                                                    <i class="fa fa-plus-circle"></i> Add To Cart
                                                </button>
                                            </form>
                                        </div>	<!-- End of /.products -->
                                    </div>
                                    <?php
                                    $i++;
                                }

                                $result->close();
                            }
                            ?>
                            <!--  ... -->
                    </div>	<!-- End of /.products-grid -->

                </div>	<!-- End of /.col-md-9 --><!-- End of /.row -->



<?php include "includes/footer.inc.php"; ?>
