<?php
class DB{

	private $conn;
	public $result;

	public function __construct(){
		echo 'DB CLass Constructor is called';
		$this->conn = mysqli_connect('localhost','root','rimsha','db_g8');

		if(!$this->conn){
			die('Could not establish a DB connection.');
		}
	}

	public function query($sql){
		$this->result = mysqli_query($this->conn,$sql);
		if($this->result){
			return true;
		}
	}

	public function getRow(){

		return mysqli_fetch_assoc($this->result);
	}

	public function getRows(){
		$data= array();
		while($row = mysqli_fetch_assoc($this->result) ){
			$data[] = $row;
		}

		return $data;
	}

	public function getNumRows(){
		return mysqli_num_rows($this->result);
	}

	public function insert(){

	}

	public function update(){

	}

	public function delete(){

	}

}
