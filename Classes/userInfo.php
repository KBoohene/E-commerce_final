<?php

class userInfo{

  function userInfo(){
    session_start();
  }

  function setSession($userId,$username){
    $_SESSION['userId']=$userId;
    $_SESSION['username']=$username;
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

    // destroy the session
    session_destroy();
  }
}



?>
