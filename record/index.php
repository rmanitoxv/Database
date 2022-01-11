<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
?>
        <!DOCTYPE html>
        <hmtl>
            <head>
                <title>
                    Welcome
                </title>
            </head>
            <body>
                <h1> Welcome <?php echo $_SESSION['username'] ?>!! </h1>
                <br>
                <?php
                $id = $_SESSION['userID'];
                $registered = mysqli_query($con, "SELECT * FROM registration WHERE registrationID = '$id'");
                $staff = mysqli_query($con, "SELECT * FROM staff WHERE staffID = '$id'");
                $student = mysqli_query($con, "SELECT * FROM student WHERE studentID = '$id'");
                $staffresult =  mysqli_fetch_assoc($staff);
                $studentresult =  mysqli_fetch_assoc($student);
                $result = mysqli_fetch_assoc($registered);
                if(mysqli_num_rows($registered) > 0){
                    if ($result['regPDF'] == ''){ ?>
                        <a href="registration2.php">Input Vaccination Certificate PDF</a>
                    <?php } 
                    else { ?>
                        Not Yet Validated
                <?php } }
                else if(mysqli_num_rows($staff) > 0){ ?>
                    First Name: <?php echo $staffresult['staffFname']; ?> <br>
                    Middle Name: <?php  echo $staffresult['staffMname']; ?> <br>
                    Last Name: <?php  echo $staffresult['staffLname']; ?> <br>
                    Suffix: <?php  echo $staffresult['staffExt']; ?> <br>
                    Birthdate: <?php  echo $staffresult['staffBirthdate']; ?> <br>
                    Phone Number: <?php  echo $staffresult['staffPhone']; ?> <br>
                    <br>
                    First Dose:<br>
                    Date Given: <?php  echo $staffresult['staffDateGiven1']; ?> <br>
                    Vaccine: <?php  echo $staffresult['staffVac1']; ?> <br>
                    Brand: <?php  echo $staffresult['staffBrand1']; ?> <br>
                    Lot Number: <?php  echo $staffresult['staffLot1']; ?> <br>
                    Country: <?php  echo $staffresult['staffCountry1']; ?> <br>
                    <br>
                    Second Dose:<br>
                    Date Given: <?php  echo $staffresult['staffDateGiven2']; ?> <br>
                    Vaccine: <?php  echo $staffresult['staffVac2']; ?> <br>
                    Brand: <?php  echo $staffresult['staffBrand2']; ?> <br>
                    Lot Number: <?php  echo $staffresult['staffLot2']; ?> <br>
                    Country: <?php  echo $staffresult['staffCountry2']; ?> <br>
                    <br>
                    Vaccination Certificate:<br>
                    <iframe src="img/<?php echo $staffresult['staffPDF']; ?>" width='90%' height='750px'; ?>"></iframe><br><br>
                <?php
                }
                else if(mysqli_num_rows($student) > 0){ ?>
                    First Name: <?php echo $studentresult['studentFname']; ?> <br>
                    Middle Name: <?php  echo $studentresult['studentMname']; ?> <br>
                    Last Name: <?php  echo $studentresult['studentLname']; ?> <br>
                    Suffix: <?php  echo $studentresult['studentExt']; ?> <br>
                    Birthdate: <?php  echo $studentresult['studentBirthdate']; ?> <br>
                    Phone Number: <?php  echo $studentresult['studentPhone']; ?> <br>
                    <br>
                    First Dose:<br>
                    Date Given: <?php  echo $studentresult['studentDateGiven1']; ?> <br>
                    Vaccine: <?php  echo $studentresult['studentVac1']; ?> <br>
                    Brand: <?php  echo $studentresult['studentBrand1']; ?> <br>
                    Lot Number: <?php  echo $studentresult['studentLot1']; ?> <br>
                    Country: <?php  echo $studentresult['studentCountry1']; ?> <br>
                    <br>
                    Second Dose:<br>
                    Date Given: <?php  echo $studentresult['studentDateGiven2']; ?> <br>
                    Vaccine: <?php  echo $studentresult['studentVac2']; ?> <br>
                    Brand: <?php  echo $studentresult['studentBrand2']; ?> <br>
                    Lot Number: <?php  echo $studentresult['studentLot2']; ?> <br>
                    Country: <?php  echo $studentresult['studentCountry2']; ?> <br>
                    <br>
                    Vaccination Certificate:<br>
                    <iframe src="img/<?php echo $studentresult['studentPDF']; ?>" width='90%' height='750px'; ?>"></iframe><br><br>
                <?php }
                else{   ?>
                    <a href="registration.php">Input Vaccination Details</a>
                        <?php  }?>
                <h1> <a href="password.php">Change Password</a></h1>
                <h1> <a href="logout.php">Logout</a></h1>
            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>