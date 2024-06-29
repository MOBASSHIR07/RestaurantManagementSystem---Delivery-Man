<?php
//session_start();
// require_once('user-info-model.php');
//if(isset($_COOKIE['id'])){

//$status = userInfo($_COOKIE['id']);
//if($status['Role'] == "Delivery Man" and $status['Status'] == "Active"){
//$_SESSION['flag']="true";
//header('location:deliveryman-home.php');


//}
/*if (isset($_COOKIE['user_id'])) {
  require_once('user-info-model.php');

  
  $status = userInfo($_COOKIE['user_id']);

  if ($status['Role'] == "Delivery Man" and $status['Status'] == "Active") {
      session_start();
      $_SESSION['LoggedIn'] = "true";
      header('location:deliveryman-home.php');
      exit();
  }
}*/





// }
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];

  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'bannedUser': {
        $error_msg = "Your account is currently banned.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
    case 'loginFirst': {
        $error_msg = "Log in first.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please sign in.";
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
  <title>Sign In</title>
  <style>

    .image-container {
      text-align: center;

    }

    #img {

      border-radius: 50%;
      /*0 2px 4px rgba(0, 0, 0, 0.2),
    0 4px 8px rgba(0, 0, 0, 0.3);*/
    }

    #sign-in {

      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      width: 300px;
    }

    #email {

      padding: 10px;
      margin: 5px 0;
      border: 1px solid #dddddd;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }
    #password {

padding: 10px;
margin: 5px 0;
border: 1px solid #dddddd;
border-radius: 4px;
width: 100%;
box-sizing: border-box;
}

    input:focus {
      outline: none;
      border-color: #3498db;
      box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    button:hover {
      background-color: #1E90FF;
      opacity: 2;
    }

    button {
      background-color: #00CED1;
      color: #ffffff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      width: 100%;
    }

    .label {
      margin-top: 10px;
      color: #555555;
      display: block;
    }

    body {

      background-color: #f5e6cc;
      line-height: 1.2;
    }
  </style>
</head>

<body>
  <div class="image-container">
    <img id="img" src="360_F_275700347_09reCCwb7JBxTKiYQXsyri4riMKaHbj8.jpg" width="150" height="130">
  </div>



  <table width="27%" id="sign-in" border="1" cellspacing="0" cellpadding="25" align="center">
    <tr>
      <td>
        <form method="post" id="sign-in"action="../controller/sign-in-controller.php" novalidate autocomplete="off">
          <h1>Sign In</h1>
          <label class="lebel">Email</label>
          <input id="email" type="email" id="input" name="email" size="43px">
          <span id="emailError"></span> 
          <br><br>
          Password
          <input id="password" type="password" id="input" name="password" size="43px">
          <span id="passwordError"></span> 
          <br><br>
          <button size="250px"  name="submit" id="sign-in-btn">Sign In</button>
          <br>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgot-password.php">Forgot-Password?</a>
          <br><br><input type="checkbox" name ="rememberMe"> **Save Account**
          <?php if (strlen($error_msg) > 0) { ?>
            <br>
            <font color="red" align="center"><?= $error_msg ?></font>
            <br><br>
          <?php } ?>
          <?php if (strlen($success_msg) > 0) { ?>
            <br>
            <font color="green" align="center"><?= $success_msg ?></font>
            <br><br>
          <?php } ?>

          <br><br>
        </form>
        <hr width="auto">
        Dont have an account?
        <br><br>
        <a href="sign-up.php"><button>Sign Up</button></a>
      </td>
    </tr>
  </table>

</body>

<script src="js/Delivery_Man/sign-in.js"></script>

</html>