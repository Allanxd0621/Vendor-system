<?php 
session_start();

$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_db');
$id = $_SESSION['id'];

if(!$cann){
    die("Connection Failed");
}

$sql = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($cann , $sql);

$data = mysqli_fetch_assoc($result);

$username = $data['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>

    <?php echo 'hi' . $username; ?>

    </h1>
</body>
</html>