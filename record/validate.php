<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
        $id = $_GET['id'];
        $approvestudent = "INSERT INTO student SELECT * FROM registration WHERE registrationID=$id ";
        $approvestaff = "DELETE FROM registration OUTPUT DELETED * student WHERE registrationID=$id ";
        $reject = "DELETE FROM registration WHERE registrationID=$id;";
        $sql = "SELECT * FROM login WHERE userID = $id";
        $sql1 = mysqli_query($con, $sql);
        $get = mysqli_fetch_assoc($sql1);
        if (isset($_POST['approve'])){
            if ($get['isStudent'] == 1){
                mysqli_query($con,$approvestudent);
                mysqli_query($con,$reject);
                header("Location: validatestudents.php");}
            else if($get['isStaff'] == 1){
                mysqli_query($con,$approvestaff);
                mysqli_query($con,$reject);
                header("Location: validatestaff.php");}
        }
        if (isset($_POST['reject'])){
            mysqli_query($con,$reject);
            if ($get['isStudent'] == 1){
                header("Location: validatestudents.php");}
            else if($get['isStaff'] == 1){
                header("Location: validatestaff.php");}
        }
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
                <?php
                $query = "SELECT * FROM registration WHERE registrationID = $id";
                $result = mysqli_query($con, $query);
                $rows = mysqli_fetch_assoc($result);
                ?>
                First Name: <?php echo $rows['regFname']; ?> <br>
                Middle Name: <?php  echo $rows['regMname']; ?> <br>
                Last Name: <?php  echo $rows['regLname']; ?> <br>
                Suffix: <?php  echo $rows['regExt']; ?> <br>
                Birthdate: <?php  echo $rows['regBirthdate']; ?> <br>
                Phone Number: <?php  echo $rows['regPhone']; ?> <br>
                <br>
                First Dose:<br>
                Date Given: <?php  echo $rows['regDateGiven1']; ?> <br>
                Vaccine: <?php  echo $rows['regVac1']; ?> <br>
                Brand: <?php  echo $rows['regBrand1']; ?> <br>
                Lot Number: <?php  echo $rows['regLot1']; ?> <br>
                Country: <?php  echo $rows['regCountry1']; ?> <br>
                <br>
                Second Dose:<br>
                Date Given: <?php  echo $rows['regDateGiven2']; ?> <br>
                Vaccine: <?php  echo $rows['regVac2']; ?> <br>
                Brand: <?php  echo $rows['regBrand2']; ?> <br>
                Lot Number: <?php  echo $rows['regLot2']; ?> <br>
                Country: <?php  echo $rows['regCountry2']; ?> <br>
                <br>
                Vaccination Certificate:<br>
                <iframe src="img/<?php echo $rows['regPDF']; ?>" width='90%' height='750px'; ?>"></iframe><br><br>
                <form action = "" method="POST">
                    <button type="submit" name="approve">APPROVE</button>
                    <button type="submit" name="reject">REJECT</button>
                </form>

            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>