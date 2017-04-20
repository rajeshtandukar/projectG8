<?php
session_start();
if( isset($_COOKIE['remember'])){
	include 'db.php';
	$token = $_COOKIE['remember'];
	//echo $token;exit;

	$sql = "SELECT * FROM tbl_users WHERE token='$token'";
	$result = mysqli_query($conn, $sql);
	if($result){
		$_SESSION['userlogin']= true;
		$_SESSION['user'] = mysqli_fetch_assoc($result);
	}
}