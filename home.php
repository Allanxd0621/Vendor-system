<?php 
$cann = mysqli_connect('localhost' , 'root' ,'' , 'vendor_user_db');

if(!$cann){
    die("Connection Failed");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $foodName = $_POST['food_Name'];
    $foodPrice = $_POST['food_Price'];

    $foodStatus = 'pending'; // just string so that it wont be visible in inspection 
    
    $sql = "INSERT INTO orders (food_Name , food_Price , food_Status) VALUES ('$foodName' , '$foodPrice' , '$foodStatus')";

    mysqli_query($cann , $sql);

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- ge butang ranato sa form ang foods na e order with fixed values -->
    <form method="POST">
        <h1>Burger</h1>
        <input type="hidden" value="burger" name="food_Name">
        <input type="hidden" value="20" name="food_Price">
        <button type="submit">Order</button>

    </form>

</body>
</html>
