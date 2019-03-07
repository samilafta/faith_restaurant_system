<?php
require_once "core/init.php";

unset($_SESSION['admin_uname']);
session_destroy();

redirect("adminlogin.php");
exit;
