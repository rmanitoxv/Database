<?php
session_start();
if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="registration1.php" method="post" autocomplete="off" ectype="multipart/form-data">
      <?php if(isset($_GET['error'])) {?>
      <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>      
      <label for="fname">First Name : </label>
      <input type="text" name="fname" id = "fname" required value=""> <br>
      <label for="mname">Middle Name : </label>
      <input type="text" name="mname" id = "mname" required value=""> <br>
      <label for="lname">Last Name : </label>
      <input type="text" name="lname" id = "lname" required value=""> <br>
      <label for="nameext">Suffix : </label>
      <input type="text" name="nameext" id = "nameext"> <br>
      <label for="birthdate">Birthdate : </label>
      <input type="date" name="birthdate" id = "birthdate" required value=""> <br>
      <label for="phone">Phone Number : </label>
      <input type="text" name="phone" id = "phone" required value=""> <br>
      <br>
      First Dose:<br>
      <label for="date_given1">Date Given: </label>
      <input type="date" name="date_given1" id = "date_given" required value=""> <br>
      <label for="vaccine1">Vaccine: </label>
      <input type="text" name="vaccine1" id = "vaccine" required value=""> <br>
      <label for="brand1">Brand: </label>
      <input type="text" name="brand1" id = "brand" required value=""> <br>
      <label for="lot_number1">Lot Number: </label>
      <input type="text" name="lot_number1" id = "lot_number"> <br>
      <label for="country1">Country: </label>
      <input type="text" name="country1" id = "country" required value=""> <br>
      <br>
      Second Dose:<br>
      <label for="date_given2">Date Given: </label>
      <input type="date" name="date_given2" id = "date_given" required value=""> <br>
      <label for="vaccine2">Vaccine: </label>
      <input type="text" name="vaccine2" id = "vaccine" required value=""> <br>
      <label for="brand2">Brand: </label>
      <input type="text" name="brand2" id = "brand" required value=""> <br>
      <label for="lot_number2">Lot Number: </label>
      <input type="text" name="lot_number2" id = "lot_number"> <br>
      <label for="country2">Country: </label>
      <input type="text" name="country2" id = "country" required value=""> <br>

      <button type="submit" name="submit">Submit</button>
    </form>
  </body>
</html>
<?php 
    }
    else {
        header("Location: form.php");
        exit();
    }
?>