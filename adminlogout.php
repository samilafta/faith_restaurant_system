<?php
require_once "core/init.php";

unset($_SESSION['email']);
unset($_SESSION['full_name']);
unset($_SESSION['staffID']);
unset($_SESSION['level']);
session_destroy();

redirect("index.php");
exit;
