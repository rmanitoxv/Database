<?php
session_start();
require 'config.php';
if(isset($_SESSION['userID']) && isset($_SESSION['username'])) {
if(isset($_POST["submit"])){
  if($_FILES["pdf"]["error"] == 4){
    echo
    "<script> alert('pdf Does Not Exist'); </script>"
    ;
  }
  else{
    $id = $_SESSION['userID'];
    $fileName = $_FILES["pdf"]["name"];
    $fileSize = $_FILES["pdf"]["size"];
    $tmpName = $_FILES["pdf"]["tmp_name"];

    $validpdfExtension = ['pdf'];
    $pdfExtension = explode('.', $fileName);
    $pdfExtension = strtolower(end($pdfExtension));
    if ( !in_array($pdfExtension, $validpdfExtension) ){
      echo
      "
      <script>
        alert('Invalid PDF Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('PDF Size Is Too Large');
      </script>
      ";
    }
    else{
      $newpdfName = uniqid();
      $newpdfName .= '.' . $pdfExtension;

      move_uploaded_file($tmpName, 'img/' . $newpdfName);
      $query = ("UPDATE registration SET regPDF='$newpdfName' WHERE registrationID=$id");
      if(mysqli_query($con, $query)){
        echo
        "
        <script>
            alert('Successfully Added');
            document.location.href = 'index.php';
        </script>
        ";
      }
      else{"
        <script>
        alert('Error');
    </script>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Vaccination Certificate</title>
  </head>
  <body>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <label for="pdf">Vaccination Certificate : </label>
      <input type="file" name="pdf" id = "pdf" accept=".pdf" value=""> <br> <br>
      <button type = "submit" name = "submit">Submit</button>
    </form>
    <br>
  </body>
</html>
<?php
    }
    else {
        header("Location: form.php");
        exit();
    }
?>