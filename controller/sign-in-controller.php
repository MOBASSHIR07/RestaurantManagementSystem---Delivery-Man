<?php
session_start();

    //require_once('user-info-model.php');
    // require_once('view/user-info-model.php');
    require_once('../model/user-info-model.php');

    

    

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../view/sign-in.php?err=empty');
           
            return;

        }

    
        $rememberMe = false;
         if(isset($_POST["rememberMe"])) $rememberMe = true;
         else $rememberMe = false;



        $status = login($email, $password);

        if($status!=false){
            
            if($status['Role'] == "Delivery Man" and ($status['Status'] == "Active" or $status['Status'] == "Resigning")){

                $_SESSION['LoggedIn'] = "true";
                if($rememberMe) setcookie("LoggedIn", true, time()+99999, "/");
                else setcookie("LoggedIn", true, time()+10, "/");
                setcookie("id", $status['UserID'], time()+3600*24*30, "/");
               header('location:../view/deliveryman-home.php');
               

            }
            else header('location:../view/sign-in.php?err=bannedUser');

        }else header('location:../view/sign-in.php?err=mismatch');
        
    

?>