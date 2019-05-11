<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
    <?php
    $_SESSION["NAME"] = $_POST["name"];
    $_SESSION["EMAIL"] = $_POST["email"];
    ?>

    <div>
        <p>You are in the confirmation page</p>
        
        <p>Name: <?php $_SESSION["NAME"] ?>
        <p>Shipping to: <?php $_SESSION["EMAIL"] ?></p>
        <p>Your cart lists:</p><br>
        <ul>
        <?php
            foreach ($_SESSION["ITEMS"] as $item) {
                echo ("<li><p>$item</p></li>");
            }
        ?>
        </ul>
    </div>
</body>
</html>