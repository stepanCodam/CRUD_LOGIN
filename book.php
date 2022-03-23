<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$backBtn = '';
//if it is a user it will create a back button to home.php
if (isset($_SESSION["user"])) {
    $backBtn = "home.php";
}
//if it is a adm it will create a back button to dashboard.php
if (isset($_SESSION["adm"])) {
    $backBtn = "dashboard.php";
}


$sql = "INSERT INTO booking (fk_userid,	hotel_id) VALUES ({$_SESSION["user"]}, {$_GET["id"]})";
$res = mysqli_query($connect, $sql);
if($res){
    echo "Success";

}else {
    echo "Error";
}

?>