<?php

   // session_start();
    session_destroy();
    
    setcookie("id","",time()-100000000,"/");

    header("location:../view/sign-in.php" );
    
?>