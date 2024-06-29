<?php

    require_once('user-info-model.php');
    require_once('order-info-model.php');
    require_once('notification-model.php');
            
    $id = $_COOKIE['id'];
    $row = userInfo($id);
    $orderID = $_GET['id'];

    $row2 = getOrderInfo($orderID);

    $cid = getIDByFullname($row2['CustomerName']);

    $status = takeOrder($orderID, $row['Fullname']);
    if($status){
        
        customerNotification($cid, "Our delivery man, {$row['Fullname']} has picked up your order. Please wait for it to arrive", "Customer");
        header('location:order-list.php');

    } 


?>