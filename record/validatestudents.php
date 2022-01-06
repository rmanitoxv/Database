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
                <table border = 1 cellspacing = 0 cellpadding = 10>
                    <tr>
                        <td>Username</td>
                        <td>Name</td>
                        <td>Check</td>
                    </tr>
                    <?php
                    $query = "SELECT * FROM registration INNER JOIN login ON registrationID = userID WHERE isStudent = 1";
                    $rows = mysqli_query($con, $query)
                    ?>

                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <?php $id = $row['registrationID'];
                        echo "<tr><td>";
                        echo $row['username'];
                        echo "</td><td>";
                        echo $row['regLname'];
                        echo ", ";
                        echo $row['regFname'];
                        echo " ";
                        echo $row['regMname'];
                        echo " ";
                        echo $row['regExt'];
                        echo "</td>";
                        echo "<td> <a href='validate.php?id=",$id; echo "'>Validate</a></td></tr>"; ?>
                    <?php endforeach; ?>
                </table>
            </body>
        </hmtl>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>