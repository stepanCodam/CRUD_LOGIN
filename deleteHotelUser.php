<?php

session_start();
require_once 'components/db_connect.php';
require_once 'components/boot.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}


$class = 'd-none';

$id = $_GET["id"];
$sql = "DELETE FROM booking WHERE bookingId = $id";
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
    <h1>ALOOO</h1>
    <a class="btn btn-primary" href="home.php" role="button">Link</a>
</body>
</html>