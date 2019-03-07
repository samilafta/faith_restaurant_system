<?php

require_once "../../core/init.php";

if (isset($_POST['deleteMail'])) {
    
    $id = $_POST['mail_id'];

    if(deleteMessage($id) == true)    {
        redirect("../mail.php?deleted+successfully");
    }   else    {
        redirect("../mail.php?an+error+occurred");
    }
}