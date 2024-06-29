<?php

session_start();
require "../../model/user-info-model.php";
$id = $_COOKIE['id']; 

$data = userInformation($id); 

$dataJson = json_encode($data);
echo $dataJson;

// Example URL: localhost:8081/Final/RestaurantManagementSystem - Delivery Man/api/user-information.php
?>
