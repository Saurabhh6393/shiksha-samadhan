<?php
 $_server="localhost";
 $_username ="root";
 $_password = "";
 $_database = "db project";
 
 $con = mysqli_connect($_server , $_username , $_password , $_database);
      if(!$con){
         die("database connection due to failed" . mysqli_connect_error());
      }
?>