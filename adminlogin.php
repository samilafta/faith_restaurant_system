<?php

require_once "core/init.php";
global  $connect;

if (isset($_SESSION['admin_uname']))   {
    redirect("admin/index.php");
    exit();
}

if (isset($_POST['adminlogin'])) {

    $uname = validate($_POST['uname']);
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE email = '$uname' AND password = '$pwd'";
    $run = $connect->query($sql);
    if ($run->num_rows == 1)   {
        $fetch = $run->fetch_array();
        $_SESSION['admin_uname'] = $fetch['firstname'];
        redirect("admin/index.php");
    }   else    {
        $error = "Your username or password is incorrect!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>WASTEK SERVICES | Admin Login</title>

    <!-- Icons -->
    <link href="admin/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/assets/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="admin/assets/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-2">

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
                        <div class="card-block">
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="email" name="uname" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button name="adminlogin" class="btn btn-primary px-2">Login</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%; ">
                    <div class="card-block text-center">
                        <div>
                            <h2>WASTEK SERVICES</h2>
                            <p>ADMINISTRATOR LOGIN</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="admin/assets/js/libs/jquery.min.js"></script>
<script src="admin/assets/js/libs/tether.min.js"></script>
<script src="admin/assets/js/libs/bootstrap.min.js"></script>



</body>

</html>
