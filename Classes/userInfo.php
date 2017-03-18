<?php
include_once('adb.php');
class userInfo extends adb{

  function userInfo(){
    session_start();
  }

  function setSession($userId,$username,$fullname,$accountType){
    $_SESSION['userId']=$userId;
    $_SESSION['username']=$username;
    $_SESSION['fullname']=$fullname;
    $_SESSION['acctype']=$accountType;
  }

  function checkSession(){
    if(isset($_SESSION)){
      return true;
    }
    else{
      return false;
    }
  }

  function getSession(){
    return $_SESSION;
  }

  function endSession(){
    // remove all session variables
    session_unset();
  }

  function addTolog($personId,$acctype){
    $strQuery="INSERT INTO login_log(PersonID,account_type) VALUES ($personId,$acctype)";
    return $this->query($strQuery);
  }
}



?>
