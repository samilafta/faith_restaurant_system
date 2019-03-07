<?php
require_once "../core/init.php";

if (!isset($_SESSION['username']))   {
    redirect("../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitcomment'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $message = validate($_POST['message']);

    if(addMessage($name, $email, $message) == true) {
        redirect("contact.php?sent");
    }   else    {
        $error = "Message could not be sent. Please try again.";
    }

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
                    <li><a href="orders.php">Your Orders</a></li>
                    <li class="active"><a href="contact.php">Contact Us</a></li>
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
                    <h1>Contact Us</h1>
                    <p>Leave a suggestion or comment about our service.</p>
                </div>	<!-- End of /.col-md-4 -->
                <div class="col-md-8 hidden-xs">
                    <ol class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>	<!-- End of /.col-md-8 -->
            </div>	<!-- End of /.row -->
        </div>	<!-- End of /.container -->
    </section>	<!-- End of /#Topic-header -->






    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-9 clearfix">

                    <div class="leave-comment">
                        <h5>LEAVE A COMMENT</h5>

                        <?php
                        if(isset($error)) {
                                ?>
                                <div class="alert alert-danger">
                                    <i class="fa fa-times-circle"></i> &nbsp; <?php echo $error; ?>
                                </div>
                                <?php
                        }
                        else if(isset($_GET['sent'])) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fa fa-check-circle"></i> Message successfully sent. Thank you very much for your contribution.
                            </div>
                            <?php
                        }
                        ?>


                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label for="inputname" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="inputname" placeholder="Name" name="name" required>
                                </div>
                            </div>	<!-- End of /.form-group -->
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required/>
                                </div>
                            </div>	<!-- End of /.form-group -->
                            <div class="form-group">
                                <label for="inputmessage" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputmessage"  rows="3" name="message" required></textarea>
                                </div>
                            </div>	<!-- End of /.form-group -->

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-primary" name="submitcomment">Send</button>
                                </div>
                            </div>	<!-- End of /.form-group -->
                        </form>	<!-- End of /.form-horizontal -->
                    </div>	<!-- End of /.leave comments -->
                </div>	<!-- End of /.col-md-9 -->
            </div>	<!-- End of /.row -->
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
