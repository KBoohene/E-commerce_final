<?php

include_once("adb.php");
class userInfo extends adb
{
  function userInfo(){

  }

  function setSession($userId){
    $_SESSION['userId']=$userId;
  }

  function checkSession(){
    if(isset($_SESSION['userId'])){
      return true;
    }
    else{
      return false;
    }
  }

  function getSession(){
    return $_SESSION;
  }

  function startSession(){
    session_start();
  }

  function endSession(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
  }

}

?>
