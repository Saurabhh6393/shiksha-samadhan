<?php
 $login = false;

 if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $_server="localhost";
    $_username ="root";
    $_password = "";
    $_database = "db project";
    
    $con = mysqli_connect($_server , $_username , $_password);
         if(!$con){
            die("database connection due to failed" . mysqli_connect_error());
         }

         $name = $_POST["name"];
         $password = $_POST["password"];

         $sql = "SELECT * FROM `db project`.`st register` WHERE name = '$name' AND password = '$password'";
         $result = mysqli_query($con,$sql);

         $num = mysqli_num_rows($result);
         if($num == 1){
            while($row = mysqli_fetch_array($result)){
               if(password_verify($password , $row['password'])){
               $login = true;

             echo '<script>
            $(document).ready(function(){
            $("form").submit(function(){
            alert("Login Successfully. Welcome to Shiksha Samadhan");
            )};
            )};
            </script>';
            //header("location: /LearnEd_E-learning_Website-master/studentlogin.html");
         }
      }
   }
 }
?>