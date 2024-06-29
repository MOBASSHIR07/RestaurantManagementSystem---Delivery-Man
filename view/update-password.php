<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $prevpasswordMsg = $passwordMsg = $cpasswordMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'prevpasswordEmpty': {
            $prevpasswordMsg = "Previous password can not be empty.";
            break;
        }
        case 'passwordEmpty': {
            $passwordMsg = "Password can not be empty.";
            break;
        }
        case 'cpasswordEmpty': {
            $cpasswordMsg = "Confirm password can not be empty.";
            break;
        }
        case 'passwordError': {
            $prevpasswordMsg = "Incorrect password.";
            break;
        }
        case 'invalid': {
            $passwordMsg = "Invalid password.";
            break;
        }
        case 'mismatch': {
            $cpasswordMsg = "Passwords do not match.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'updated': {
        $success_msg = "Password successfully updated.";
        break;
      }
  }
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="css/external2.css">
</head>
<body>
    <table  id ="sign-in"  width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/update-password-controller.php" novalidate autocomplete="off">
                    <h1>Update Password</h1>
                    <br><br>
                    Previous Password
                    <input id="password" type="password" name="prevpassword" size="43px">
                    <span id="prevpasswordError"></span>
                    <?php if (strlen($prevpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $prevpasswordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    New Password
                    <input id="newpassword" type="password" name="password" size="43px">
                    <span id="passwordError"></span>
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Confirm New Password
                    <input id="cpassword"  type="password" name="cpassword" size="43px">
                    <span id="cpasswordError"></span>
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button id ="resign" name="submit">Change Password</button>
                </form>
            </td>
        </tr>
    </table>
    <br>
    <br>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a  href="profile.php">Go Back</a>
</body>
<script src="js/Delivery_Man/upgrade-password.js"></script> 

</html>