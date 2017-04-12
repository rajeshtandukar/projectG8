<?php

$conn = mysqli_connect('localhost','root','rimsha','db_g8');
if(!$conn){
	
	die('Could not establish a DB connection.');
}