<?php
  if(isset($_POST["submit"])) {
  $fileName = $_FILES['UploadFile']['name'];
  $fileLocation =$_FILES['UploadFile']['tmp_name'];
  $fileDestination ="Uploads/".basename($_FILES['UploadFile']['name']);
  $fileDirectory = pathinfo($fileDestination);

  if(move_uploaded_file($fileLocation, $fileDestination)){
    echo "True";
  }


}
?>
