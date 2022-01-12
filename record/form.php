<!DOCTYPE html>
<html>
    <head>
        <title> LOGIN </title>
    </head>
<body>
    <form action="login.php" method="POST">
        <h2>LOGIN</h2>  
        <label> Username: </label>
        <input type="text" name="username" placeholder="Username"><br>
        <label> Password: </label>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit"> Login </button>
        <?php if(isset($_GET['error'])) {?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
    </form>
</body>
</html>
