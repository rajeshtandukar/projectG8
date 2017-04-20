<?php
include 'db.php';

class userModel extends DB{

	public function __construct(){
		//echo "usermodel constructor is called";
		parent::__construct();
	}

	public function getUserList($limistart,$limit){

		$sql = "SELECT * FROM tbl_users ORDER BY id DESC LIMIT $limistart,$limit";
		$this->query($sql);
		return $this->getRows();
	}

	public function addUser(){

	}

	public function getTotalRecords(){
		$sql = "SELECT count(*) AS total FROM tbl_users";
		$this->query($sql);
		$row = $this->getRow();
		return $row['total'];
	}



}