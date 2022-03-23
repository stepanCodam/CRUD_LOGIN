<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}



// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$rowuser = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM hotels";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['price'] . "</td>
            <td><a href='book.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Book</button></a>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $rowuser['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $rowuser['picture']; ?>" alt="<?php echo $rowuser['first_name']; ?>">
            <p class="text-white">Hi <?php echo $rowuser['first_name']; ?></p>
        </div>
        <a href="logout.php?logout">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>">book a Hotel</a>
    </div>
    <p class='h2'>Products</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
</html>