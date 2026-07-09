<?php 

session_start();
// i will create a simple sign up page and save it inside a database but i wont be hashing the password for a while to see if the password truly  is in the user table 

//so in php my admin i created a database called practice_db inside it is a table with username and password as the values 

$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_db');
// we connected our php file to the database first by mysqli_connect() 
// the name of the host, file , idk , and the name of the DB 

$lack = ''; //lacking message
$error = false;

if(!$cann){
    die("Connection Failed"); // if browser did'nt connect to the Database this will appear.
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //if there is something in the post method form this will execute

    if(empty($_POST['username']) || empty($_POST['password'])){
        //if there is lacking or empty in inputs this will execute
        $error = true;
        $lack = 'Inputs should not be empty.';
    }

    if(!$error){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (username, password) VALUES ('$username' , '$password')";

         mysqli_query($cann , $sql);

        $_SESSION['username'] = $_POST['username'];


         header('Location: login.php');
         exit();

         // instead of going immediately to the home page i decided to session the username of the user that has been inputted in this page to be transferred in the log in page to minimize the user's more works 





    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    
<form  method="post">
    <input type="text" placeholder="Create Usernmae" name="username"> <br>
    <input type="password" placeholder="Create password" name="password">
    <button type="submit">Create Account</button>
</form>

</body>
</html>