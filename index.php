<?php
require_once "core/init.php";
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Faith Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="user/css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="user/css/owl.carousel.css">
	<link rel="stylesheet" href="user/css/owl.theme.css">
	<link rel="stylesheet" href="user/css/bootstrap.min.css">
	<link rel="stylesheet" href="user/css/font-awesome.min.css">
	<link rel="stylesheet" href="user/css/style.css">
	<link rel="stylesheet" href="user/css/responsive.css">

	<!-- jS -->
	<script src="user/js/jquery.min.js" type="text/javascript"></script>
	<script src="user/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="user/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="user/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="user/js/jquery.nicescroll.js"></script>
	<script src="user/js/jquery.scrollUp.min.js"></script>
	<script src="user/js/main.js" type="text/javascript"></script>


</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->
	
	<section id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<p class="contact-action"><i class="fa fa-phone-square"></i>IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+233 0547 57 6916</strong></p>
				</div>
				<div class="col-md-3 clearfix">
					<ul class="login-cart">
						<li>
							<a href="login.php">
							<i class="fa fa-user"></i>
								Login
							</a>
						</li>
						<li>
                            <a href="signup.php">
                                <i class="fa fa-sign-out"></i>
                                Register
                            </a>
                        </li>
					</ul>
				</div>
			</div> <!-- End Of /.row -->
		</div>	<!-- End Of /.Container -->

	</section>  <!-- End of /Section -->
	


	<!-- LOGO Start
    ================================================== -->
	
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#">
						<img src="user/images/logo.png" alt="logo">
					</a>
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</header> <!-- End of /Header -->


	<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="slider" class="nivoSlider">
				    	<img src="user/images/slider.jpg" alt="" />
				    	<img src="user/images/slider1.jpg" alt=""/>
				    	<img src="user/images/slider2.jpg" alt="" />
					</div>	<!-- End of /.nivoslider -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section> <!-- End of Section -->


	
	<!-- FEATURES Start
    ================================================== -->

	<section id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class="fa fa-ambulance"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Free Shipping</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class=" fa fa-foursquare"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Media heading</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class=" fa fa-phone"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Call Us</h4>
						    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
						  </div>	<!-- End of /.media-body -->
						</div>	<!-- End of /.media -->
					</div>	<!-- End of /.block -->
				</div> <!-- End of /.col-md-4 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of section -->



	<!-- CATAGORIE Start
    ================================================== -->

<section id="catagorie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-heading">
                        <h2>OUR FOOD CATEGORIES</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a class="catagotie-head">
                                    <img src="user/images/category-image-1.jpg" alt="...">
                                    <h3>Breakfast</h3>
                                </a>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
                                </div>	<!-- End of /.caption -->
                            </div>	<!-- End of /.thumbnail -->
                        </div>	<!-- End of /.col-sm-6 col-md-4 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a class="catagotie-head">
                                    <img src="user/images/category-image-2.jpg" alt="...">
                                    <h3>Lunch</h3>
                                </a>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
                                </div>	<!-- End of /.caption -->
                            </div>	<!-- End of /.thumbnail -->
                        </div>	<!-- End of /.col-sm-6 col-md-4 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a class="catagotie-head">
                                    <img src="user/images/category-image-3.jpg" alt="...">
                                    <h3>Others</h3>
                                </a>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, aut, esse, laborum placeat id illo a expedita aperiam...</p>
                                </div>	<!-- End of /.caption -->
                            </div>	<!-- End of /.thumbnail -->
                        </div>	<!-- End of /.col-sm-6 col-md-4 -->
                    </div>	<!-- End of /.row -->
                </div>	<!-- End of /.block -->
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of Section -->



	
		<!-- PRODUCTS Start
    ================================================== -->

	<section id="products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="products-heading">
						<h2>Menu</h2>
					</div>
				</div>
			</div>
			<div class="row">
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
                $mcat = $row['menu_category'];
                $mprice = $row['menu_price'];

                ?>

                <div class="col-md-3">
					<div class="products">
						<a>
                            <img src="admin/uploads/<?php echo $mimage; ?>" alt="">
						</a>
						<a>
                            <h4><?php echo $mname; ?></h4>
						</a>
                        <p class="price">¢<?php echo $mprice; ?></p>
						<a class="view-link shutter addcart" href="#">
							<i class="fa fa-plus-circle"></i>Add To Cart</a>
					</div>	<!-- End of /.products -->
				</div>  <!-- End Of Col-md-3 -->
                    <?php
                    $i++;
                }

                    $result->close();
                }
                ?>

			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->


	
	
		<!-- CALL TO ACTION Start
    ================================================== -->

	<section id="call-to-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Our Partners</h2>
						</div>
					</div>	<!-- End of /.block -->
					<div id="owl-example" class="owl-carousel">
						<div> <img src="user/images/company-1.png" alt=""></div>
						<div> <img src="user/images/company-2.png" alt=""></div>
						<div> <img src="user/images/company-3.png" alt=""></div>
						<div> <img src="user/images/company-4.png" alt=""></div>
						<div> <img src="user/images/company-5.png" alt=""></div>
						<div> <img src="user/images/company-6.png" alt=""></div>
						<div> <img src="user/images/company-8.png" alt=""></div>
						<div> <img src="user/images/company-9.png" alt=""></div>
					</div>	<!-- End of /.Owl-Slider -->
				</div>	<!-- End of /.col-md-12 -->
			</div> <!-- End Of /.Row -->
		</div> <!-- End Of /.Container -->
	</section>	<!-- End of Section -->
	
	

	<!-- FOOTER Start
    ================================================== -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block clearfix">
						<a href="#">
							<img src="user/images/footer-logo.png" alt="">
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


<script>

    document.querySelector(".addcart").addEventListener("click", function () {
        alert("Please log in before making an order.");
    })

</script>


</body>
</html>