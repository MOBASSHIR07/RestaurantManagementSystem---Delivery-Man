<?php

$error_msg = '';

if (isset($_GET['err'])) {
    //var_dump($_GET['err']); 
  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "Email can not be empty";
        break;
      }
    case 'notFound': {
        $error_msg = "Email does not exist in our database.";
        break;
      }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href ="css/external2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="js/Delivery_Man/forget-password.js"></script>
    
</head>
<body>
    <br>
    <table id ="sign-in" width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                
                <form id ="sign-in" method="post" onsubmit="return isValid(this);" action="../controller/forgot-password-controller.php"  novalidate autocomplete="off" >
                    <h1>Password Assistance</h1>
                    Email
                    <input id ="input" type="email" name="email"  size="43px">
                    <span id="emailERROR"></span>
                    <?php if (strlen($error_msg) > 0) { ?>
                        
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><br>
                   &nbsp &nbsp &nbsp &nbsp &nbsp  <button id="resign" name="submit">Continue</button>
                </form>
            </td>
        </tr>
    </table>

</body>


</html>