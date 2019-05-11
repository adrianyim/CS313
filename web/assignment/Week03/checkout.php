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

    ?>
    <div>
        <p>You are in the checkout page</p>
        <form method="post" action="<?php htmlspecialchars($_SERVER["confirmation.php"]); ?>">
            Name:
            <input type="text" placeholder="Name" name="Name"> <br>
            Email:
            <input tyoe="text" placeholder="Email" name="Email"> <br>

            <input type="submit" value="Confirm">
        </form>
    </div>
</body>
</html>