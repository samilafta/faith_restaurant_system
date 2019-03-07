<?php

require_once "../../core/init.php";

// EDIT MODAL VALIDATION

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitEdit']))    {
    $id = $_POST['mid'];
    $name = validate($_POST['name']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $img = $_FILES['image']['name'];
    $imgLoc = $_FILES['image']['tmp_name'];

    $loc = "../uploads/$img";
    move_uploaded_file($imgLoc, $loc);

    if ($category == "0")    {
        redirect("../menu.php?select+category");
    }

    $run = updateMenu($id, $name, $img, $category, $price);

    if ($run)   {
        redirect("../menu.php?menu+updated");
    }   else    {
        redirect("../menu.php?error+occured");
    }
}


// DELETE MODAL VALIDATION

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitDel']))    {
    $mid = $_POST['mid'];
    $mname = $_POST['name'];

    $run = deleteMenu($mid, $mname);
    if ($run)   {
        redirect("../menu.php?menu+deleted");
    }   else    {
        redirect("../menu.php?error+occurred");
    }
}
