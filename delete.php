<?php
include 'db.php';
$id = $_GET['id'];
$sql ="DELETE FROM tbl_users WHERE id='$id'";
mysqli_query($conn,$sql);

header('Location: index.php');

