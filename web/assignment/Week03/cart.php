<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
    include 'header.php';

    $ITEMS = htmlspecialchars($_POST["item"]);
    ?>
    
    <div>
        <p>Your cart lists:</p><br>
        <ul>
        <?php
            foreach ($ITEMS as $item) {
                echo ("<li><p>$item</p></li>");
            }
        ?>
        </ul>
        <input type="button" value="continue shopping">
        <input type="button" value="Checkout">
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>