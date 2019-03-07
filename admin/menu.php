<?php
require_once "../core/init.php";

if (!isset($_SESSION['admin_uname']))   {
    redirect("../adminlogin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['menusubmit'])) {
    $name = validate($_POST['name']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $img = $_FILES['image']['name'];
    $imgLoc = $_FILES['image']['tmp_name'];

    $loc = "uploads/$img";
    move_uploaded_file($imgLoc, $loc);

    if ($category === "0")    {
        $error[] = "Please select a menu category.";
    }
    else{

        if(addMenu($name, $img, $category, $price) == true)    {
            redirect("menu.php?added");
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
        <li class="breadcrumb-item active">Menu</li>
    </ol>

    <!-- MAIN CONTENT -->
    <div class="container-fluid">

        <!-- ADD MENU FORM -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Add menu</h6>
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
                                <i class="fa fa-check-circle"></i> Menu successfully added.
                            </div>
                            <?php
                        }
                        ?>

                        <div class="card-block">
                            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" class="form-control" name="name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price GH¢</label>
                                            <input id="price" class="form-control" name="price" pattern="\d{0,10}\.?\d{0,2}" title="eg. 55.00" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="0">---</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Lunch">Lunch</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <label id="" class="file center-block">
                                                <input type="file" id="file" name="image" required/>
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="reset" class="btn btn-warning">
                                        <i class="fa fa-times"></i> Cancel
                                    </button>
                                    <button name="menusubmit" class="btn btn-primary">
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
                            <h6>List of Foods</h6>
                            <div class="card-actions">
                                <a href=""><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                <a href="" class="btn-close"><small class="text-muted"><i class="fa fa-times"></i></small></a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-striped table-hover dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price GH¢</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                global $connect;
                                $sql = "SELECT * FROM menu ORDER BY menu_id DESC ";
                                $result = $connect->query($sql);
                                $i = 1;
                                while ($row = $result->fetch_array()) {
                                    $mid = $row['menu_id'];
                                    $mname = $row['menu_name'];
                                    $mimage = $row['menu_img'];
                                    $mcat = $row['menu_category'];
                                    $mprice = $row['menu_price'];
                                    $mdate = $row['date_added'];


                                    ?>


                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $mname ?></td>
                                        <td><?php echo $mcat; ?></td>
                                        <td><?php echo $mprice ?></td>
                                        <td><?php echo $mdate ?></td>
                                        <td>
                                            <a class="btn btn-success" data-toggle="modal"
                                               data-target="#detailModal<?php echo $mid; ?>">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                            <a class="btn btn-info" data-toggle="modal"
                                               data-target="#editModal<?php echo $mid; ?>">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" data-toggle="modal"
                                               data-target="#deleteModal<?php echo $mid; ?>">
                                                <i class="fa fa-trash-o "></i>
                                            </a>
                                        </td>
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


    <?php

    global $connect;
    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
    while ($row = $result->fetch_array()) {
        $mid = $row['menu_id'];
        $mname = $row['menu_name'];
        $mimage = $row['menu_img'];
        $mcat = $row['menu_category'];
        $mprice = $row['menu_price'];
        $mdate = $row['date_added'];


    ?>
        <!-- detail modal -->
        <div class="modal fade" id="detailModal<?php echo $mid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-success" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Menu <i class="fa fa-cutlery"></i> </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Menu Name: </b><?php echo $mname; ?></p>
                        <p><b>Menu Category: </b><?php echo $mcat; ?></p>
                        <p><b>Menu Price: </b>¢<?php echo $mprice; ?></p>
                        <p><img src="uploads/<?php echo $mimage; ?>" </p>
                        <p><b>Date Added: </b>¢<?php echo $mdate; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /detail modal -->

        <!-- edit modal -->
        <div class="modal fade" id="editModal<?php echo $mid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="style-form" action="validations/addmenu.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Menu Name</label>
                                <input type="hidden" id="name" class="form-control" name="mid" value="<?php echo $mid; ?>"/>
                                <input id="name" class="form-control" name="name" value="<?php echo $mname; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="price">Price GH¢</label>
                                <input id="price" class="form-control" name="price" pattern="\d{0,10}\.?\d{0,2}" title="eg. 55.00" value="<?php echo $mprice; ?>" required/></div>
                            <div class="form-group">
                                <label for="category">Menu Category</label>
                                <select id="category" name="category" class="form-control" value="<?php echo $mcat; ?>" required>
                                    <option value="0">---</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Image</label>
                                <input type="file" id="file" name="image" required/>
                                <span class="file-custom"></span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="submitEdit"><i class="fa fa-check"></i>Yes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /edit modal -->

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal<?php echo $mid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <b><?php echo $mname; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <form class="style-form" action="validations/addmenu.php" method="post">
                            <input type="hidden" name="mid" value="<?php echo $mid; ?>"/>
                            <input type="hidden" name="name" value="<?php echo $mname; ?>"/>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" name="submitDel"><i class="fa fa-check"></i>Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /delete modal -->
        <?php
        }

        $result->close();
        ?>

        <!-- /LIST OF MENU -->
    </div>
    <!-- /MAIN CONTENT -->
</main>



<?php include "includes/footer.php"; ?>