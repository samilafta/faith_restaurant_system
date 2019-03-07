<?php
require_once "../../core/init.php";


if (isset($_POST['checkout']))  {

    $name = validate($_POST['name']);
    $address = validate($_POST['address']);
    $paymentm = $_POST['paymentm'];
    $notes = validate($_POST['notes']);
    $userid = $_POST['userid'];
    $ordercode = $_POST['ordercode'];
    $amount = $_POST['totalamount'];

    if (addOrder($ordercode, $userid, $name, $address, $paymentm, $notes, $amount) == true)   {
        unset($_SESSION['usercode']);
        $code = randomString();
        $_SESSION['usercode'] = $code;
        redirect("../orders.php");
    }


}