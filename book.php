<?php
session_start();
require_once 'components/boot.php';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a class="btn btn-primary" href="home.php" role="button">Link</a>
</body>
</html>