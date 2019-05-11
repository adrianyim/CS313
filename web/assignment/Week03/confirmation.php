<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $_SESSION["NAME"] = $_POST["name"];
    $_SESSION["EMAIL"] = $_POST["email"];
    ?>

    <div>
        <p>You are in the confirmation page</p>
        <p>Name: <?php $NAME ?>
        <p>Shipping to: <?php $EMAIL?></p>
    </div>
</body>
</html>