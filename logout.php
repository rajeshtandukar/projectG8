<?php
include 'session.php';
session_destroy();
setcookie('remember',0);
header('location: login.php');