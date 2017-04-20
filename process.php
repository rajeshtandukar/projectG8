<?php
session_start();
include 'db.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = $_POST['name'];	
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$remember_token = md5($username);
	$image = $_FILES['image'];
	$filename='';
	//var_dump($image);exit;

	$id = isset($_POST['id'])?$_POST['id']:null;

	if($image){
	
		$fielparts = explode('.', $image['name']);
		$extension = array_pop($fielparts);
		$filename = time().date('Ymd').'.'.$extension ;
		

		$uploadPath = 'uploads/'.$filename;
		move_uploaded_file($image['tmp_name'], $uploadPath);

	}
	if($id){ // Edit
		$sql = "UPDATE tbl_users SET name='$name',address='$address'
		WHERE id='$id'
		";

	}else{ // Insert
		$sql= "INSERT INTO tbl_users(name,address,username,password,token,image) VALUES('$name','$address','$username','$password','$remember_token','$filename')";
		//echo $sql;
		
	}
	$db = new DB();
	$result = $db->query($sql);
	if($result){
		header('location: index.php');
	}

}else{

	die('You don\'t have direct acess!');

}