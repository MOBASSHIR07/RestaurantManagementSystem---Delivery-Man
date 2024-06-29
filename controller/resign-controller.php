<?php

    require_once('../model/user-info-model.php');
            
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $password = $_POST['password'];

    if(empty($password)){
        header('location:../view/resign.php?err=empty'); 
        exit();
    }

    if($password != $row['Password']){
        header('location:../view/resign.php?err=mismatch'); 
        exit();
    }

    $status = resign($id);
    if($status) header('location:../view/resign.php?success=confirmed');

?>