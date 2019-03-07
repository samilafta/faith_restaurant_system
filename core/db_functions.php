<?php


// function for logging a user in the system
function doLogin($uname, $pwd)  {
    global  $connect;
    $sql = "SELECT * FROM customer WHERE cus_uname = '$uname'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    $hash_pwd = $row['cus_pwd'];
    $hash = password_verify($pwd, $hash_pwd);

    if ($hash === 0)   {
        return false;
    }   else{

        $sql = "SELECT * FROM customer WHERE cus_uname = '$uname' AND cus_pwd = '$pwd'";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        if ($row)   {
            $_SESSION['username'] = $row['cus_uname'];
        }   else    {
            return false;
        }
    }
}


// function for checking whether a user is already logged in
function isLoggedIn()   {
    if(isset($_SESSION['user_session'])) {
        return true;
    }
}


// function for registering a user in the system

function registerUser($fname, $uname, $email, $pwd, $address, $tel) {

    global $connect;

    $newPassword = password_hash($pwd, PASSWORD_DEFAULT);
    if ($newPassword) {
        $sql = "INSERT INTO `customer` (`cus_id`, `cus_fname`, `cus_uname`, `cus_email`, `cus_pwd`, `cus_address`, `cus_tel`, `date_registered`) VALUES (NULL, '$fname', '$uname', '$email', '$newPassword', '$address', '$tel', CURRENT_TIMESTAMP)";
        $query = $connect->query($sql);
        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}

// function for entering a new menu

function addMenu($mname, $mimg, $mcat, $mprice)  {
    global $connect;
    $sql = "INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_img`, `menu_category`, `menu_price`, `date_added`) VALUES (NULL, '$mname', '$mimg', '$mcat', '$mprice', CURRENT_TIMESTAMP)";
    $query = $connect->query($sql);
    if ($query)   {
        return true;
    }   else    {
        return false;
    }

}


function updateMenu($mid, $mName, $mImg, $mCat, $mPrice) {
    global $connect;
    $sql = "UPDATE `menu` SET `menu_name` = '$mName', `menu_img` = '$mImg', `menu_category` = '$mCat', `menu_price` = '$mPrice' WHERE `menu`.`menu_id` = '$mid'";
    $result = $connect->query($sql);
    return $result;

}


function deleteMenu($mid, $mname)   {
    global $connect;
    $sql = "DELETE FROM `menu` WHERE `menu_id`='$mid' AND `menu_name`='$mname'";
    $result = $connect->query($sql);
    return $result;
}

function addMessage($name, $email, $message)   {
    global $connect;
    $sql = "INSERT INTO `messages` (`message_id`, `message_sender`, `sender_email`, `message_details`, `date_sent`) VALUES (NULL, '$name', '$email', '$message', CURRENT_TIMESTAMP)";
    $result = $connect->query($sql);
    return $result;
}

function deleteMessage($id)    {
    global $connect;
    $sql = "DELETE FROM `messages` WHERE `message_id`='$id'";
    $result = $connect->query($sql);

    return $result;
}

function addItem ($code, $mid, $qty, $total, $date) {
    global $connect;
    $sql = "INSERT INTO `orderline` (`orderlineID`, `trans_code`,`menu_id`, `quantity`, `total_price`, `date`) VALUES (NULL, '$code', '$mid', '$qty', '$total', '$date')";
    $result = $connect->query($sql);
    return $result;
}


function addOrder ($code, $cusID, $name, $deliveryAdd, $paym, $notes, $amount )    {
    global $connect;
    $sql = "INSERT INTO `orders` (`orderID`, `order_code`, `cus_id`, `name`, `delivery_address`, `payment_method`, `status`, `notes`, `total_amount`, `order_date`) VALUES (NULL, '$code', '$cusID', '$name', '$deliveryAdd', '$paym', 'pending', '$notes', '$amount', CURRENT_TIMESTAMP)";
    $result = $connect->query($sql);
    return $result;
}

function deleteOrder($orderid)  {
    global  $connect;
    $sql = "DELETE FROM `orders` WHERE orderID = '$orderid'";
    $result = $connect->query($sql);
    return $result;
}

function deleteOrderline($ordercode)    {
    global  $connect;
    $sql = "DELETE FROM `orderline` WHERE trans_code = '$ordercode'";
    $result = $connect->query($sql);
    return $result;
}