<?php

require_once "../../core/init.php";

global $connect;

$code = $_SESSION['usercode'];

if (deleteOrderline($code) == true)   {
    redirect("../menu.php");
}


