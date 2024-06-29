<?php 

session_start();
require "../user-info-model.php";
$data = userEmailCheck($_GET['email']);
$data = json_encode($data);
echo $data;
// localhost:8081/Final/RestaurantManagementSystem - Delivery Man/api/user-email-check.php?email=tanvirs264@gmail.com

?>