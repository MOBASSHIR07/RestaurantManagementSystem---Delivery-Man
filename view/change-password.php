<?php
session_start();

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "Enter you DOB first.";
        break;
      }
    case 'dobError': {
        $error_msg = "The DOB's does not match.";
        break;
      }
    case 'invalid': {
        $error_msg = "Password is invalid.";
        break;
      }
    case 'mismatch': {
        $error_msg = "Passwords do not match.";
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
    <title>OTP Confirmation</title>
    <link rel="stylesheet" href="css/external2.css">
</head>
<body>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/change-password-controller.php" novalidate autocomplete="off">
                    <h1>Create New Password</h1>
                    <br>
                    In order the change your password, you need to enter your birth year correctly.
                    <br><br>
                    Enter DOB <br>
                    <input id ="input" type="date" name="dob">
                    <span id="dobError"></span>

                  
                    <br><br>
                    <hr width=auto>
                    <br>
                    New Password
                    <input id="input" type="password" name="password" size="43px">
                    <span id="passwordError"></span>
                    <br><br>
                    Confirm New Password
                    <input id="input" type="password" name="cpassword" size="43px">
                    <span id="cpasswordError"></span>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button id="input" name="submit">Change Password</button>
                </form>
            </td>
        </tr>
    </table>
</body>
<script src="js/Delivery_Man/otp-confirmation.js"></script>
</html>