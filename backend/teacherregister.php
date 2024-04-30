
<?php
  $insert = false;
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $_server="localhost";
  $_username ="root";
  $_password = "";
  
  $con = mysqli_connect($_server , $_username , $_password);
       if(!$con){
          die("database connection due to failed" . mysqli_connect_error());
       }
    
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password= $_POST['password'];
       $conpassword = $_POST['conpassword'];

       $ExistSql = "SELECT * FROM `db project`. `te register` WHERE name = '$name'";
       $result = mysqli_query($con,$ExistSql);
       $numExistRows = mysqli_num_rows($result);

       if( $numExistRows >0){
        echo '<script>alert("username already exist")</script>';
       }
       else{
  
           if($password == $conpassword){
          $hash= password_hash($password,PASSWORD_DEFAULT);
          $sql ="INSERT INTO `db project`.`te register` ( `name`, `email`, `password`, `conpassword`) VALUES ('$name', '$email', '$hash', '$conpassword')";
  
          $result = mysqli_query($con,$sql);
  
          if($result){
           $insert=true;  

           echo '<script>
             $(document).ready(function(){
              $("form").submit(function(){
                
            
            alert("Registration Successfully . Now you can login");
            )};
            )};
            </script>';



           header("location: /LearnEd_E-learning_Website-master/teacherlogin.html");
         }
        }  
        else{
          echo '<script>alert("password do not match")</script>';
        }
    }
      }
  ?>