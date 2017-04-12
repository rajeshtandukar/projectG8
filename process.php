<?php
session_start();
include 'db.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = $_POST['name'];	
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$remember_token = md5($username);

	$id = isset($_POST['id'])?$_POST['id']:null;

	if($id){ // Edit
		$sql = "UPDATE tbl_users SET name='$name',address='$address'
		WHERE id='$id'
		";

	}else{ // Insert
		$sql= "INSERT INTO tbl_users(name,address,username,password,token) VALUES('$name','$address','$username','$password','$remember_token')";
		//echo $sql;
		
	}

	$result = mysqli_query($conn,$sql);
	if($result){
		header('location: index.php');
	}


	
	
	

}else{

	die('You don\'t have direct acess!');

}