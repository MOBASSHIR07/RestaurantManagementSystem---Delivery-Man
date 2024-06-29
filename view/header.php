<?php require_once('../model/user-info-model.php');
 $row = userInfo($_COOKIE['id']); ?><br><br>
 
<center>
   <h1> Downtown Dinner Restaurant </h1> 
   <h3> Welcome <?php echo $row['Fullname']?> <h3>
</center>
<br><br>