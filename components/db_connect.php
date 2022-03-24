<?php

$localhost = "127.0.0.1";   
$username = "root";    ##stefancodefactor
$password = ""; ##]=ODZMQ9e$YS
$dbname = "hotelbooking"; ## test_log_crud

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}