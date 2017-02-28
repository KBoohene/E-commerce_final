<?php
$uploadFolder="Uploads/";
//echo file_exists($uploadFolder.$fileToDownload);

  if(isset($_POST["submit"])) {
    $fileToDownload = $_POST['filename'];

    if(file_exists($uploadFolder.$fileToDownload)){
      header('Content-Disposition:attachement; filename='.$fileToDownload);
      $data = file_get_contents($uploadFolder.$fileToDownload);
      print($data);
    }
    else{
      echo "File doesnt exist";
    }

  }


?>
