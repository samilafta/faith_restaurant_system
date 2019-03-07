


    <div class="col-md-3">
        <div class="blog-sidebar">
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

                        if ($result->num_rows == 0)   {
                            echo "<style>.orderButton {display: none;}</style>";
                            echo "<tr><td><b>No items added to cart.</b></td></tr>";
                        }   else    {
                            while ($row = $result->fetch_array())    {
                                ?>
                                    <tr>
                                        <td><?php echo $row['menu_name']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td>¢<?php echo $row['total_price']; ?></td>
                                        <td>
                                            <form method="post" action="validations/deleteitem.php">
                                                <input type="hidden" name="id" value="<?php echo $row['orderlineID']; ?>"/>
                                                <button class="btn btn-outline-danger" name="deleteitem" title="click to delete"><i class="fa fa-trash-o"></i></button>
                                            </form>

                                        </td>
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
                        }

                    ?>
                    </tbody>
                </table>
                    <div class="orderButton">
                        <a href="checkout.php" class="btn btn-success btn-lg btn-block">Order Now!</a>
                    </div>
            </div>
        </div>	<!-- End of /.col-md-3 -->

    </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
    </section>	<!-- End of Section -->

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