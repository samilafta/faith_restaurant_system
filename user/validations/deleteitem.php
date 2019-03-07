<?php
require_once "../../core/init.php";

global $connect;

if(isset($_POST['deleteitem'])) {
    $id = $_POST['id'];
    $sql = "DELETE from orderline WHERE orderlineID='$id'";
    $result = $connect->query($sql);

    if ($result)   {
        redirect("../menu.php");
    }


}
