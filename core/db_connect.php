<?php
/**
 * Created by PhpStorm.
 * User: SAMMY
 * Date: 1/3/2018
 * Time: 5:12 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api";

// create connection
$connect = new Mysqli($servername, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
}
