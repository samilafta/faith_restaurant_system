<?php
require_once "../../core/init.php";


if (isset($_POST['additem']))   {
    $mid = $_POST['mid'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $usercode = $_POST['usercode'];
    $date = $_POST['date'];

    $total = number_format($price * $qty, 2);

    if (!isset($_SESSION['code'])) {

        if (addItem($usercode, $mid, $qty, $total, $date) == true)   {

            redirect("../menu.php");
        }

    }



}