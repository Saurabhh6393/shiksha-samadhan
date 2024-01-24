<?php
$insert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_server = "localhost";
    $_username = "root";
    $_password = "";

    $con = mysqli_connect($_server, $_username, $_password);
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $additional = $_POST['details'];

    $sql = "INSERT INTO `db project`.`feedback` (`Name`, `Email`, `Additional`) VALUES ('$name', '$email', '$additional')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $insert = true;
        echo '<script>
                alert("Thank you for your Feedback");
                window.location.href = "/LearnEd_E-learning_Website-master/index.html";
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Error: Form not submitted.";
}
?>
