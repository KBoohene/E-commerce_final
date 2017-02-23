<?php
//CHANGELOG
//Created Class - 1/25/2017
/**
*Database connection helper
*/
include_once("setting.php");
/**
* Database connection helper class
*/
class adb{
	var $db=null;
	var $result=null;
	function adb(){
	}
	/**
	*Connect to database
	*@return boolean ture if connected else false
	*/
	function connect(){

		//connect
		$this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
		if($this->db->connect_errno){
			//no connection, exit
			return false;
		}
		return true;
	}

	/**
	*Query the database
	*@param string $strQuery sql string to execute
	*/

  function query($strQuery){
    if(!$this->connect()){
        return false;
    }
    if($this->db==null){
        return false;
    }
    $this->result=$this->db->query($strQuery);
    if($this->result==false){
        return false;
    }

    return $this->result;
	}

	/**
	*Query the database
	*@param string $strQuery sql string to execute
	*/
	function adb_query($strQuery){
		if(!$this->connect()){
			return false;
		}
		if($this->db==null){
			return false;
		}
		$this->result=$this->db->query($strQuery);
		if($this->result==false){
			return false;
		}
		return true;
	}
	/*
	* Fetch from the current data set and return
	*@return array one record
	*/
	function adb_fetch(){
		//Complete this funtion to fetch from the $this->result
		if($this->result==null){
			return false;
		}

		if($this->result==false){
			return false;
		}

		return $this->result->fetch_assoc();
	}


}

?>
