<?php 
session_start();

$username = $_SESSION['username']; 

$cann = mysqli_connect('localhost' , 'root' , '' ,'practice_db');
$error = false;
$lack = '';

if(!$cann){
    die("Connection Failed");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(empty($_POST['username']) || empty($_POST['password'])){

    $error = true;
    $lack = 'Inputs must not be empty.';


    }

    if(!$error){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($cann , $sql);

        $users = mysqli_fetch_assoc($result);

        if($users && $password == $users['password']){

            $_SESSION['id'] = $users['id'];

            header('location: home.php');
            exit();

        }else{
            $lack = 'Username or Password is Wrong';
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in page</title>
</head>
<body>
    <form method="post">
        <input type="text" placeholder="username" value="<?php echo $username ?>" name="username">
        <br>
        <input type="password" placeholder="password" name="password"> 
        <p><?php echo $lack; ?></p>
        <button type="submit"></button>
    </form>
</body>
</html>