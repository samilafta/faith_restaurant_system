<?php
require_once "core/init.php";

unset($_SESSION['username']);
session_destroy();

redirect("login.php");
exit;
