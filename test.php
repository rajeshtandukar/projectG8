<?php

$indedAray= array();

$data = array();
$data['name'] = 'Rajesh';
$data['address'] = 'Dillibazar,Kathmandu';
$indedAray[]= $data;
$indedAray[]= $data;

echo '<pre>';
//print_r($data);
echo 'Before JSON<br>';
print_r($indedAray);

$encode = json_encode($indedAray);
echo 'After json encode<br>';
echo $encode;
setcookie('records',$encode,time()+(86400*5));


$readCookie = $_COOKIE['records'];
$decode = json_decode($readCookie,true);
echo 'Read cookie data and convert to array<br>';
print_r($decode);