

<?php
$insert = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  
include 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$address = $_POST['address'];

$sql = "INSERT INTO `db project`.`st full detail` ( `name`, `email`, `phone`, `course`, `address`) VALUES ('$name', '$email', '$phone', '$course', '$address')";

$result = mysqli_query($con,$sql);
if($result){
    $insert=true;
    header("location: /LearnEd_E-learning_Website-master/Student-Dashboard-main/index2.php" );
  
}
}
?>