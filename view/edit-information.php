<?php
session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');
    require_once('../model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $fullnameMsg = $emailMsg = $phoneMsg = $addressMsg = $religionMsg =  $usernameMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'fullnameEmpty': {
            $fullnameMsg = "Fullname can not be empty.";
            break;
        }
        case 'phoneEmpty': {
            $phoneMsg = "Phone number can not be empty.";
            break;
        }
        case 'addressEmpty': {
            $addressMsg = "Address can not be empty.";
            break;
        }
        case 'emailEmpty': {
            $emailMsg = "Email can not be empty.";
            break;
        }
        case 'dobEmpty': {
            $dobMsg = "Date of birth can not be empty.";
            break;
        }
        case 'religionEmpty': {
            $religionMsg = "Religion can not be empty.";
            break;
        }
        case 'usernameEmpty': {
            $usernameMsg = "Username can not be empty.";
            break;
        }
        case 'fullnameInvalid': {
            $fullnameMsg = "Fullname is not valid.";
            break;
        }
        case 'phoneInvalid': {
            $phoneMsg = "Phone number is not valid.";
            break;
        }
        case 'emailInvalid': {
            $emailMsg = "Email is not valid.";
            break;
        }
        case 'emailExists': {
            $emailMsg = "Email already exists.";
            break;
        }
        case 'usernameInvalid': {
            $usernameMsg = "Username is not valid.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'changed': {
        $success_msg = "Information successfully updated.";
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
    <title>Edit Information</title>
</head>
<body>
    <table id ="sign-in" width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form id="ajax"  novalidate autocomplete="off">
                    <h1>Edit Information</h1>
                    Fullname
                    <input id="input"  type="text" name="fullname" size="43px" value= "<?php echo "{$row['Fullname']}"; ?>">
                    <span id="fullnameError"></span> 
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Phone
                    <input id="input"  type="text" name="phone" size="43px" value= "<?php echo "{$row['Phone']}"; ?>">
                    <span id="phoneError"></span> 
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Email
                    <input id="input"  type="email" name="email" size="43px" value= "<?php echo "{$row['Email']}"; ?>">
                    <span id="emailError"></span> 
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Address
                    <input id="input"  type="text" name="address" size="43px" value= "<?php echo "{$row['Address']}"; ?>">
                    <span id="addressError"></span> 
                    <?php if (strlen($addressMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $addressMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Religion &nbsp;&nbsp;&nbsp;
                    <select name="religion">
                        <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
                        <option value="Islam" <?php if($row['Religion'] == "Islam") echo "selected"; ?>>Islam</option>
                        <option value="Hindu" <?php if($row['Religion'] == "Hindu") echo "selected"; ?>>Hindu</option>
                        <option value="Christian" <?php if($row['Religion'] == "Christian") echo "selected"; ?>>Christian</option>
                    </select>
                    <span id="religionError"></span> 
                    <?php if (strlen($religionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $religionMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Username
                    <input id="input"  type="text" name="username" size="43px" value= "<?php echo "{$row['Username']}"; ?>">
                    <span id="usernameError"></span> 
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <button>Update Information</button>
                </form>
            </td>
        </tr>
    </table>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a  href="profile.php">Go Back</a>
</body>
</body>
<script src="js/Delivery_Man/edit-information.js"></script>

</html>