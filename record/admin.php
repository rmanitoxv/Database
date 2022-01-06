<?php
    session_start();
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
                <h1> <a href="newuser.php">Add New User</a>
                <h1> <a href="validatestudents.php">Validate Students Registrations?</a>
                <h1> <a href="validatestaff.php">Validate Staff Registrations?</a>
                <h1> <a href="logout.php">Logout</a>
            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>