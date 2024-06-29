<?php

    session_start();
    if(!isset($_COOKIE['LoggedIn'])) header('location:../view/sign-in.php?err=loginFirst');
    require_once('../model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row=  userInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Man Home</title>
    
<link rel="stylesheet" href="css/external.css">

</head>
<body>
    <br>
<div class="image-container">
  <img id="img" src="360_F_275700347_09reCCwb7JBxTKiYQXsyri4riMKaHbj8.jpg" width="150" height="130">
</div>

    <?php require_once('header.php')?>
    <p align="right"><?php echo "<img src=\" {$row['ProfilePicture']} \" width=\"80px\">"; ?> &nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php"><strong>Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../controller/logout-controller.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;</p></strong>
    <table id ="sign-in" width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
           <div id ="generic"> <td>
                <a href="notification.php">Notification</a>
                <br><br>
                <a href="order-list.php">Order List</a>
                <br><br>
                <a href="confirm-delivery.php">Confirm Delivery</a>
                <br><br>
                <a href="delivery-history-and-earnings.php">Delivery History and Earnings</a>
                <br><br>
                <a href="resign.php">Resign</a>
            </td>
</div>

        </tr>
    </table>
    <br>
    <br>
    <?php require_once('footer.php')?>
</body>
</html>