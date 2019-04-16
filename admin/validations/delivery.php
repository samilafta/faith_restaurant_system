<?php
require_once "../../core/init.php";


if (isset($_POST['assign'])) {

    $booking_id = $_POST['booking_id'];
    $staff_id = $_POST['staff'];

    global $connect;
    $sql = "UPDATE `bookings` SET `staff_id` = '$staff_id', `status` = '1' WHERE `bookings`.`book_id` = '$booking_id'";
    $result = $connect->query($sql);

    if ($result)   {
        redirect("../bookings.php?staff+assigned");
    }   else    {
        redirect("../bookings.php?error+occurred");
    }

}

if (isset($_GET['book'])) {

    $booking_id = $_GET['book'];

    global $connect;
    $sql = "UPDATE `bookings` SET `status` = '3' WHERE `bookings`.`book_id` = '$booking_id'";
    $result = $connect->query($sql);

    if ($result)   {
        redirect("../bookings.php?cancelled");
    }   else    {
        redirect("../bookings.php?error+occurred");
    }

}

if (isset($_GET['book_id'])) {

    $booking_id = $_GET['book_id'];

    global $connect;
    $sql = "UPDATE `bookings` SET `status` = '2' WHERE `bookings`.`book_id` = '$booking_id'";
    $result = $connect->query($sql);

    if ($result)   {
        redirect("../requests.php?completed");
    }   else    {
        redirect("../requests.php?error+occurred");
    }

}


