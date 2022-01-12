<?php
    session_start();
    if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
?>
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                    body {
                        font-size: 0px;
                        margin: 0px;
                    }
                </style>
            </head>
            <title>
                Admin
            </title>
            <body>

                <table border=0>
                <tr><td width=85%>
                <p>
                <img src="img/admin_logo.png" width=55%>
                </a></p>
                </td>

                <td>
                <p><a href="logout.php">
                <center>
                <img src="img/admin_logoutbutton.png" alt="Logout" width=70%>
                </a></p>
                </td>
                </tr>
                </table>

                <center>
                <p><a href="newuser.php">
                <img src="img/admin_newuser.png" alt="New User" width=100% height=28%>
                </a></p>

                <p><a href="validatestudents.php">
                <img src="img/admin_student.png" alt="Student" width=100% height=28%>
                </a></p>

                <p><a href="validatestaff.php">
                <img src="img/admin_staff.png" alt="Staff" width=100% height=28%>
                </a></p>
                </center>

            </body>
        </html>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>
