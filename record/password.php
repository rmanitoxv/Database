<?php
    session_start();
    include("config.php");
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
?>
        <!DOCTYPE html>
        <hmtl>
            <head>
                <title>
                    Change Password
                </title>
            </head>
            <body>
                <form method="POST" action="password1.php">
                <h2>Change Password</h2>
                    <?php if(isset($_GET['error'])) {?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <label> Old Password: </label>
                    <input type="password" name="oldpw" placeholder="Password" required value=""><br>
                    <label> New Password: </label>
                    <input type="password" name="newpw" placeholder="Password" required value=""><br>
                    <label> Confirm Password: </label>
                    <input type="password" name="confpw" placeholder="Password" required value=""><br>
                    <button type="submit" name="submit"> Change Password </button>
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