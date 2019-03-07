<?php
require_once "../../core/init.php";


if (isset($_POST['deleteorder'])) {

    $orderid = $_POST['orderid'];
    $ordercode = $_POST['ordercode'];


    if (deleteOrderline($ordercode) == true)   {
        if (deleteOrder($orderid) == true)   {
            redirect("../index.php?order+deleted");
        }

    }   else    {
        redirect("../index.php?error+occurred");
    }

}

