<?php
require_once "../core/init.php";

global $connect;

if (!isset($_SESSION['admin_uname']))   {
    redirect("../adminlogin.php");
    exit();
}


if (isset($_POST['datesubmit'])) {

    $from = $_POST['from'];
    $to = $_POST['to'];
    $food = $_POST['food'];

    redirect("reports.php?from={$from}&to={$to}&food={$food}");

}


?>

<?php include "includes/header.php"?>

    <main class="main">

        <h2 class="content-header-title">Reports</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Reports</li>
        </ol>


        <!-- form to generate report using dates -->

        <div class="container">

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h6>Choose Report Date</h6>
                            </div>

                            <div class="card-block">
                                <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="from">From</label>
                                                <input id="from" class="form-control" name="from" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="2001-03-05" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="to">To</label>
                                                <input id="to" class="form-control" name="to" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="2001-03-05" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="food">Food</label>
                                                <select id="food" name="food" class="form-control">
                                                    <?php
                                                    global $connect;
                                                    $sql = "SELECT menu_name FROM menu ORDER BY menu_name";
                                                    $result = $connect->query($sql);
                                                    while ($row = $result->fetch_array()) {
                                                        $mname = $row['menu_name'];
                                                        ?>
                                                        <option value="<?php echo $mname ?>"><?php echo $mname ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="reset" class="btn btn-warning">
                                            Cancel
                                        </button>
                                        <button name="datesubmit" class="btn btn-primary">
                                            Generate Report
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of form -->



        <?php
        if(isset($_GET['from']) && isset($_GET['from'])) {
            $f = $_GET['from'];
            $t = $_GET['to'];
            $food = $_GET['food'];

            ?>

            <!-- filtered report -->
            <div class="container">
                <div class="row">
                    <div class="animated fadeIn col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h6>Generated Report</h6>
                                <div class="card-actions">
                                    <a href=""><small class="text-muted"><i class="fa fa-times"></i></small></a>
                                </div>
                            </div>
                            <div class="card-block" id="printreport">
                                <h6><?php echo "As at ". $f . " to ". $t; ?></h6>
                                    <?php
                                        $sql1 = "SELECT COALESCE(SUM(orderline.quantity), 0) AS `total qty`, COALESCE(SUM(orderline.total_price), 0) AS `income` FROM orderline
                                                        INNER JOIN menu
                                                        ON orderline.menu_id = menu.menu_id
                                                        WHERE orderline.date BETWEEN '$f' AND '$t'  
                                                        AND menu.menu_name = '$food'";
                                        $result1 = $connect->query($sql1);
                                        $row1 = $result1->fetch_array();
                                            $totalQty = $row1['total qty'];
                                            $totalIncome = $row1['income'];
                                            if ($totalQty === "0" && $totalIncome === "0.00") {
                                                echo "<tr>This item <b>".$food."</b> has not been purchased yet.</tr>";
                                            }   else {
                                            ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Item Name</th>
                                            <th>Total Quantity Ordered</th>
                                            <th>Total Income GH¢</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $food ?></td>
                                            <td><?php echo $totalQty;  ?></td>
                                            <td><?php echo $totalIncome;  ?></td>
                                        </tr>
                                    <?php }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <?php
        }

        else {
            ?>

            <!-- report on all items -->
            <div class="container">
                <div class="row">
                    <div class="animated fadeIn col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h6>General Report</h6>
                                <div class="card-actions">
                                    <a href=""><small class="text-muted"><i class="fa fa-minus"></i></small></a>
                                    <a href=""><small class="text-muted"><i class="fa fa-expand"></i></small></a>
                                    <a href=""><small class="text-muted"><i class="fa fa-times"></i></small></a>
                                </div>
                            </div>
                            <div class="card-block">
                                <table class="table table-striped dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Total Quantity Ordered</th>
                                        <th>Total Income GH¢</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT menu_name FROM menu ORDER BY menu_name";
                                    $result = $connect->query($sql);
                                    $i = 1;
                                    while ($row = $result->fetch_array()) {
                                        $mname = $row['menu_name'];

                                        $sql1 = "SELECT COALESCE(SUM(orderline.quantity), 0) AS `total qty`, COALESCE(SUM(orderline.total_price), 0) AS `income` FROM orderline
                                                        INNER JOIN menu
                                                        ON orderline.menu_id = menu.menu_id
                                                        WHERE menu.menu_name = '$mname'";
                                        $result1 = $connect->query($sql1);
                                        while($row1 = $result1->fetch_array()) {
                                            $totalQty = $row1['total qty'];
                                            $totalIncome = $row1['income'];

                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $mname ?></td>
                                                <td><?php echo $totalQty;  ?></td>
                                                <td><?php echo $totalIncome;  ?></td>
                                            </tr>
                                        <?php } $i++; } ?>
                                    </tbody>
                                    <tr>
                                        <?php
                                        $sql2 = "SELECT SUM(orderline.quantity) AS qty, SUM(orderline.total_price) AS income
                                            FROM orderline INNER JOIN menu ON orderline.menu_id = menu.menu_id";

                                        $result2 = $connect->query($sql2);
                                        $row2 = $result2->fetch_array();
                                        ?>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b><?php echo $row2['qty']; ?></b></td>
                                        <td><b><?php echo $row2['income']; ?></b></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <?php

        }
        ?>


    </main>







<?php include "includes/footer.php"?>
