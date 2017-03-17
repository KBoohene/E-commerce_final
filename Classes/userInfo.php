<?php

class userInfo{

  function userInfo(){
    session_start();
  }

  function setSession($userId,$username,$fullname){
    $_SESSION['userId']=$userId;
    $_SESSION['username']=$username;
    $_SESSION['fullname']=$fullname;
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
}



?>
