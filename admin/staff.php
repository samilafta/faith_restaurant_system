<?php
require_once "../core/init.php";

// if (!isset($_SESSION['admin_uname']))   {
//     redirect("../adminlogin.php");
//     exit();
// }

if (isset($_POST['adduser'])) {
    $name = validate($_POST['name']);
    $email = $_POST['email'];
    $level = $_POST['level'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if ($level === "0")    {
        $error[] = "Please select user level.";
    }
    else{

        if(addStaff($name, $email, $level, $phone, $password))    {
            redirect("staff.php?added");
        }   else    {
            $error[] = "An Error occurred. Please try again.";
        }

    }

}

?>

<?php include "includes/header.php"?>


<!-- Main content -->
<main class="main">

    <h2 class="content-header-title">Dashboard</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Staff</li>
    </ol>

    <!-- MAIN CONTENT -->
    <div class="container-fluid">

        <!-- ADD MENU FORM -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Add Staff</h6>
                            <div class="card-actions">
                                <a href="#" ><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                <a href="#" data-action="expand"><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                <a href="#" class="btn-close"><small class="text-muted"><i class="fa fa-times"></i></small></a>
                            </div>
                        </div>

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
                        else if(isset($_GET['added'])) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fa fa-check-circle"></i> Staff successfully added.
                            </div>
                            <?php
                        }
                        ?>

                        <div class="card-block">
                            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input id="name" class="form-control" name="name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" name="email" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select id="level" name="level" class="form-control">
                                                <option value="admin">Administrator</option>
                                                <option value="cleaner">Cleaner</option>
                                                <option value="driver">Driver</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input id="phone" class="form-control" name="phone" required/>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="password" class="form-control" name="password" required/>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="reset" class="btn btn-warning">
                                        <i class="fa fa-times"></i> Cancel
                                    </button>
                                    <button type="submit" name="adduser" class="btn btn-primary">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /ADD MENU FORM -->

        <!-- LIST OF MENU -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Staff List</h6>
                            <div class="card-actions">
                                <a href=""><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                <a href="" class="btn-close"><small class="text-muted"><i class="fa fa-times"></i></small></a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Level</th>
                                    <th>Date Added</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                global $connect;
                                $sql = "SELECT * FROM staff ORDER BY staffID DESC ";
                                $result = $connect->query($sql);
                                $i = 1;
                                while ($row = $result->fetch_array()) {
                                    $mid = $row['staffID'];
                                    $fname = $row['full_name'];
                                    $email = $row['staff_email'];
                                    $mNum = $row['mobile_number'];
                                    $level = $row['level'];
                                    $mdate = $row['created_at'];


                                    ?>


                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $fname ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $mNum ?></td>
                                        <td><?php echo $level ?></td>
                                        <td><?php echo $mdate ?></td>
                                        
                                    </tr>

                                    <?php
                                    $i++;
                                }

                                $result->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /LIST OF MENU -->
    </div>
    <!-- /MAIN CONTENT -->
</main>



<?php include "includes/footer.php"; ?>