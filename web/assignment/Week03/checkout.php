<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include 'header.php';
?>
    <div>
        <p>Checkout:</p>

        <form method="post" action="confirmation.php">
            Name:
            <input type="text" name="name" placeholder="Name"> <br>
            Shipping Address:
            <input tyoe="text" name="address" placeholder="address"> <br>

            <input type="submit" value="Confirm">
        </form>
    </div>
</body>
</html>