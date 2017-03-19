<!--
  @author Youssouf da Silva, David Okyere & Kwabena Boohene
  @desc userInfo class containing related functions
-->

<?php
include_once('adb.php');
class userInfo extends adb{

/**
*Constructor
**/
  function userInfo(){
    session_start();
  }

/**
*@desc Sets specific user session
*@param {$userId} ID number of user
*@param {$username} User username
*@param {$fullname} Full name of user
*@param {$accountType} Account type of user
**/
  function setSession($userId,$username,$fullname,$accountType){
    $_SESSION['userId']=$userId;
    $_SESSION['username']=$username;
    $_SESSION['fullname']=$fullname;
    $_SESSION['acctype']=$accountType;
  }

/**
*@desc Checks user session
*@return: True or False
**/  
  function checkSession(){
    if(isset($_SESSION)){
      return true;
    }
    else{
      return false;
    }
  }

/**
*@desc Gets user session
*@return: True or False
**/   
  function getSession(){
    return $_SESSION;
  }

/**
*@desc Terminates user session
**/   
  function endSession(){
    session_unset();
  }

/**
*@desc Adds user session to log
*@param {$personId} ID number of user
*@param {acctype} Account type
*@return: Success or Fail
**/   
  function addTolog($personId,$acctype){
    $strQuery="INSERT INTO login_log(PersonID,account_type) VALUES ($personId,$acctype)";
    return $this->query($strQuery);
  }
}



?>
