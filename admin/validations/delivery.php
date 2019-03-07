<?php
require_once "../../core/init.php";


if (isset($_POST['changeDelivery'])) {

    $orderid = $_POST['orderid'];
    global $connect;
    $sql = "UPDATE `orders` SET `status` = 'delivered' WHERE `orders`.`orderID` = '$orderid'";
    $result = $connect->query($sql);

    if ($result)   {
        redirect("../index.php?delivery+confirmed");
    }   else    {
        redirect("../index.php?error+occurred");
    }

}

