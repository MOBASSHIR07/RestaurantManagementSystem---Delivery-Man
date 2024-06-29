<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:../view/sign-in.php?err=loginFirst');
    require_once('../model/user-info-model.php'); 

    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Please enter your password first.";
            break;
        }
        case 'mismatch': {
            $error_msg = "Wrong password.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'confirmed': {
            $success_msg = "Your resign application has been submitted.";
            break;
        }
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/external2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <script src="js/Delivery_Man/resign.js"></script>
</head>
<body>
    <table id="sign-in" width="35%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <h1>Resign</h1>
            <?php echo $row['Fullname']; ?>
            <br><br>
            <form id="sign-in" method="post" action="../controller/resign-controller.php?id=<?php echo $id; ?>" onsubmit="return isValid(this);" novalidate autocomplete="off">
            Enter Your Password To Confirm Resignation <br><br><input id="input"  type="password" name="password">
            <span id="resignError"></span>
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
            <br><br><br>
            <center><button id ="resign">Resign</button></center>
            </form>
        </form>
        </td>
        </tr>
    </table>
    <br>
    <br>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a  href="deliveryman-home.php">Go Back</a>
</body>
</body>
</html>