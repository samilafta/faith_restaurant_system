<?php

require_once "core/init.php";

if (isLoggedIn() === true)   {
    redirect("user/index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    $uname = validate($_POST["uname"]);
    $pwd = $_POST["password"];

    global  $connect;
    $sql = "SELECT * FROM customer WHERE cus_uname = '$uname'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    $hash_pwd = $row['cus_pwd'];
    $hash = password_verify($pwd, $hash_pwd);

    if ($hash == false)   {
        $error = "Your username and password is incorrect!";
        //redirect("login.php?login+error");
    }   else{
        $sql = "SELECT * FROM customer WHERE cus_uname = '$uname' AND cus_pwd = '$hash_pwd'";
        $result = $connect->query($sql);
        $fetch = $result->fetch_assoc();

        if ($result->num_rows == 1)   {
            $_SESSION['username'] = $fetch['cus_uname'];
            $_SESSION['fullname'] = $fetch['cus_fname'];
            $_SESSION['userID'] = $fetch['cus_id'];
            $code = randomString();
            $_SESSION['usercode'] = $code;
            redirect("user/index.php");
        }
    }

    $connect->close();

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Faith Restaurant | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="user/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="user/css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
    <a href="index.php">
	<h1>Fa<span>i</span>th Res<span>tau</span>rant </h1>
    </a>

        <!-- login-page -->
	<div class="login-page">
		<div class="container">
			<div class="login-body">
				<h2>Fill out the form below to login</h2>

                <?php
                if(isset($error)) {

                        ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-times-circle"></i> &nbsp; <?php echo $error; ?>
                        </div>
                        <?php

                }
                ?>

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="text" class="user" name="uname" placeholder="Enter your username" required/>
					<input type="password" name="password" class="lock" placeholder="Password" required/>
					<input type="submit" value="Login" name="submit">
					<div class="forgot-grid">
						<div class="forgot">
							<a href="forgot.php">Forgot Password?</a>
						</div>
						<h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
		</div>
	</div>
	<!-- //login-page -->

	<div class="footer">
		<p>&copy; Faith Restaurant. All Rights Reserved</a></p>
	</div>



    <script src="user/js/jquery.min.js"></script>
    <script src="user/js/bootstrap.min.js"></script>
</body>
</html>