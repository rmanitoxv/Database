<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = $_POST["user"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($con, "SELECT * FROM login WHERE username = '$username'");
    if(mysqli_num_rows($duplicate) > 0){
        header ("Location: registration.php?error=Student Number Already Registered");
    }
    else{
        if($password == $confirmpassword){
            if ($user == 'Staff'){
                $sql = " INSERT INTO login VALUES('', '$username', '$password', 0, 1, 0)";
                mysqli_query($con, $sql);
                echo "Successfully Added";
                header ("Location: admin.php");
                exit();
            }
            else {
                $sql = " INSERT INTO login VALUES('', '$username', '$password', 0, 0, 1)";
                mysqli_query($con, $sql);
                echo "Successfully Added";
                header ("Location: admin.php");
                exit();
            }
        }
    else{
        header ("Location: registration.php?error=Password and Confirm Password is invalid");
    }
  }
}
}
else {
    header("Location: form.php");
    exit();
}