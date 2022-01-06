<?php
    session_start();
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
?>
        <!DOCTYPE html>
        <hmtl>
            <head>
                <title>
                    Add New User
                </title>
            </head>
            <body>
                <h1> Add New User </h1>
                <form class="" action="newuser1.php" method="post" autocomplete="off" ectype="multipart/form-data">
                    <?php if(isset($_GET['error'])) {?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <label for="username">Username : </label>
                    <input type="text" name="username" id = "username" required value=""> <br>
                    <label for="password">Password : </label>
                    <input type="password" name="password" id = "password" required value=""> <br>
                    <label for="confirmpassword">Confirm Password : </label>
                    <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
                    User Type:<br>
                    <input type="radio" name="user" value="Student">
                    <label for="Student">Student</label><br>
                    <input type="radio" name="user" value="Staff">
                    <label for="Staff">Staff</label><br>
                    <button type="submit" name="submit">Submit</button>
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