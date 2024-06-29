<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:../view/sign-in.php?err=loginFirst');
    require_once('../model/order-info-model.php');
    require_once('../model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $result = getAllOrderInProgress($row['Fullname']);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/external.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    <br><br>
    <center><h1>Order List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Customer Name
                </td>
                <td>
                    Delivery Address
                </td>
                <td>
                    Bill
                </td>
                <td>
                    Order Date
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $customerName=$w['CustomerName'];
                    $customerID = getIDByFullname($customerName);
                    $address=$w['Address'];
                    $bill=$w['Bill'];
                    $odate=$w['OrderDate'];
                    echo "    
                    <tr><td>$customerName</td>
                    <td>$address</td> 
                    <td>$bill</td>
                    <td>$odate</td>  
                    <td><a href=\"../controller/confirm-delivery-controller.php?id={$w['OrderID']}\">Mark As Delivered</a></td> 
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Order Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br>
        <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a  href="deliveryman-home.php"><b>Go Back</a></b>
</body>
</body>
</html>