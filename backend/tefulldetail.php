<?php

$insert = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  
include 'connection.php';

$email = $_POST['email'];
$phone = $_POST['phone'];
$qualification = $_POST['qualification'];
$address = $_POST['address'];

$sql = "INSERT INTO `db project`.`te full detail` ( `email`, `phone`, `qualification`, `address`) VALUES ( '$email', '$phone', '$qualification', '$address')";

$result = mysqli_query($con,$sql);
if($result){
    $insert=true;
    header("location: /LearnEd_E-learning_Website-master/teacher-Dashboard-main/teindex.php" );
}
}
?>