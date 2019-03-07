<?php


function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_email($data)  {
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    $data = filter_var($data, FILTER_VALIDATE_EMAIL);

    return $data;
}

function validatePhone($num)    {
    $numOnly = preg_replace("[0-9]", "", $num);
    $numOfDigits = strlen($numOnly);

    if ($numOfDigits === 10)   {
        return $numOnly;
    }   else    {
        return false;
    }
}


function randomString($length = 6) {
    $str = "";
    $characters  = array_merge(range("A", "Z"), range("0", "9"));
    $max = count($characters) - 1;

    for ($i = 0; $i < $length; $i++)  {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}


// redirecting a link function
function redirect($url) {

    header("Location: $url");

}