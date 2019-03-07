<?php

require_once "core/init.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))    {
    $fname = validate($_POST["fname"]);
    $uname = validate($_POST["uname"]);
    $address = validate($_POST["address"]);
    $email = validate_email($_POST["email"]);
    $tel = validatePhone($_POST["tel"]);
    $pwd = $_POST["password"];
    $pwd2 = $_POST["password2"];

    if($email === false)    {
        $error[] = "Email is not valid.";
    }   elseif ($pwd !== $pwd2)   {
        $error[] = "Passwords do not match.";
    }   elseif ($tel === false) {
        $error[] = "Invalid telephone number";
    }
    else    {
        global $connect;
        $sql = "SELECT * FROM customer WHERE cus_uname = '$uname'";

        $query = $connect->query($sql);
        if($query->num_rows > 0) {
            $error[] = "Username already exists!.";
        } else {

            if(registerUser($fname, $uname, $email, $pwd, $address, $tel) === true) {

                redirect("signup.php?joined");

            } else {

                $error[] = "An error occurred. Please try again.";

            }
        }

    }

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Faith Restaurant | Signup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Custom Theme files -->
	<link href="user/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="user/css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
    <a href="index.php">
	<h1>Fa<span>i</span>th Res<span>tau</span>rant </h1>
    </a>
	<!-- sign up-page -->
	<div class="login-page">
		<div class="container">
			<div class="login-body">
				<h2>Create your account</h2>

                <!-- success and error alert -->
                <?php
                if(isset($error)) {
                    foreach($error as $err)
                    {
                        ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-times-circle"></i> &nbsp; <?php echo $err; ?>
                        </div>
                        <?php
                    }
                }
                else if(isset($_GET['joined'])) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa fa-check-circle"></i> Successfully registered <a href="login.php">login</a> here
                    </div>
                    <?php
                }
                ?>

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" class="user" name="fname" placeholder="Enter your Full Name" required/>
					<input type="text" class="user" name="uname" placeholder="Enter your  Username" required/>
					<input type="text" class="user" name="email" placeholder="Enter your email" required/>
					<input type="password" name="password" class="lock" placeholder="Password" required/>
					<input type="password" name="password2" class="lock" placeholder="Confirm Password" required/>
					<input type="tel" class="user" name="tel" placeholder="Enter your contact number" required/>
					<input type="text" class="user" name="address" placeholder="Enter your Address" required/>
					<input type="submit" value="Sign Up" name="submit">
					<div class="forgot-grid">
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<h6>Already have an account? <a href="login.php">Login »</a> </h6>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->

	<div class="footer">
		<p>&copy; Faith Restaurant. All Rights Reserved</a></p>
	</div>

<script src="user/js/jquery.min.js"></script>
<script src="user/js/bootstrap.min.js"></script>

</body>
</html>

